<?php

include_once __DIR__ . '/../users_class/User.php';
include_once __DIR__ . '/../users_class/Reservation.php';

class DB
{
    private static $instance;
    private PDO $PDO;
    private function __construct() {
        $host = 'mysql-moor.alwaysdata.net';
        $dbname = 'moor_hamilton';
        putenv('USERNAME_DB=moor');
        putenv('PASSWORD_DB=moorDELUX');

        $this->PDO = new PDO(
            'mysql:host='.$host.';port=3306;dbname='.$dbname.';charset=utf8',
            getenv('USERNAME_DB'),
            getenv('PASSWORD_DB'),
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    }

    public static function getInstance() {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getPDO() {
        return $this->PDO;
    }

    /**
     * Ajoute un utilisateur à la base de données.
     *
     * @param string $email L'adresse email de l'utilisateur.
     * @param string $username Le nom d'utilisateur de l'utilisateur.
     * @param string $password Le mot de passe de l'utilisateur.
     * @param int $codeIcone Le code de l'icone de l'utilisateur.
     *
     * @return bool Retourne true si l'ajout réussit, sinon retourne false.
     */
    public function addUser(string $email, string $username, string $password, int $codeIcone) {
        $hashedPassword = hash('sha256', $password);

        $req = $this->PDO->prepare(
            "INSERT INTO `UTILISATEUR` (`EMAIL`, `USERNAME`, `PASSWORD`, `CODE_ICONE`)
                SELECT :email, :username, :password, :codeIcone
                WHERE NOT EXISTS (SELECT 1 FROM `UTILISATEUR` WHERE `EMAIL` = :email);"
        );
        $req->bindParam(':email', $email);
        $req->bindParam(':username', $username);
        $req->bindParam(':password', $hashedPassword);
        $req->bindParam(':codeIcone', $codeIcone, PDO::PARAM_INT);
        return $req->execute() && $req->rowCount() > 0;
    }

    /**
     * Permet de récupérer un utilisateur à partir de son email et son mot de passe.
     *
     * @param string $email L'adresse email de l'utilisateur.
     * @param string $password Le mot de passe de l'utilisateur.
     *
     * @return User|null Retourne un objet User si l'authentification réussit, sinon retourne null.
     */
    public function findUserByPassword(string $email, string $password) {
        $hashedPassword = hash('sha256', $password);

        $req = $this->PDO->prepare(
            "SELECT * FROM `UTILISATEUR`
                    WHERE `EMAIL` = :email
                    AND `PASSWORD` = :password;"
        );
        $req->bindParam(':email', $email);
        $req->bindParam(':password', $hashedPassword);
        if($req->execute()  && $req->rowCount() > 0){
            $res = $req->fetch(PDO::FETCH_ASSOC);
            $reservation = $res["ID_RESERVATION"] != null ?
                new Reservation($res["ID_RESERVATION"]) :
                null;
            return new User(
                $res["ID_UTILISATEUR"],
                $res["EMAIL"],
                $reservation,
                $res["USERNAME"],
                $res["CODE_ICONE"],
            );
        }
        else return null;
    }

    /**
     * Ajoute un cookie à la base de données.
     *
     * @param User $user L'utilisateur auquel ajouter le cookie.
     *
     * @return string|null Retourne la valeur du cookie si l'ajout réussit, sinon retourne null.
     */
    public function addCookie(User $user, bool $isSession = false) {

        $cookie = '';

        $caracteresPermis = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()-_+=<>?';
        for ($i = 0; $i < 226; $i++) {
            $indexCaractere = mt_rand(0, strlen($caracteresPermis) - 1);
            $cookie .= $caracteresPermis[$indexCaractere];
        }

        $userID = $user->id;
        $req = $this->PDO->prepare(
            "INSERT INTO `COOKIE` (`COOKIE`, `ID_UTILISATEUR`, `EXPIRATION`)
                    SELECT :cookie, :userID, "
                .($isSession ? "CURRENT_DATE " : "DATE_ADD(CURRENT_DATE, INTERVAL 395 DAY) ").
                "WHERE NOT EXISTS (SELECT 1 FROM `COOKIE` WHERE `COOKIE` = :cookie);"
        );
        $req->bindParam(':cookie', $cookie);
        $req->bindParam(':userID', $userID, PDO::PARAM_INT);
        return $req->execute() && $req->rowCount() > 0 ? $cookie : null;
    }

    /**
     * Permet de récupérer un utilisateur à partir de son email et son mot de passe.
     *
     * @param string $cookie La valeur du cookie d'authentification de l'utilisateur.
     * @param bool $isSession Indique si le cookie est un cookie de session ou non.
     *
     * @return User|null Retourne un objet User si un est trové, sinon retourne null.
     */
    public function findUserByCookie(string $cookie, bool $isSession = false) {
        $req = $this->PDO->prepare(
            "SELECT UTILISATEUR.*
                    FROM UTILISATEUR
                    JOIN COOKIE ON UTILISATEUR.ID_UTILISATEUR = COOKIE.ID_UTILISATEUR
                    WHERE COOKIE.COOKIE = :cookie "
                .($isSession ? "" : "AND COOKIE.EXPIRATION > NOW() ")
                ."LIMIT 1;"
        );
        $req->bindParam(':cookie', $cookie);
        if($req->execute()  && $req->rowCount() > 0){
            $res = $req->fetch(PDO::FETCH_ASSOC);
            $reservation = $res["ID_RESERVATION"] != null ?
                new Reservation($res["ID_RESERVATION"]) :
                null;
            return new User(
                $res["ID_UTILISATEUR"],
                $res["EMAIL"],
                $reservation,
                $res["USERNAME"],
                $res["CODE_ICONE"],
            );
        }
        else return null;
    }
}