<?php

include_once __DIR__ . '/../users_class/User.php';
include_once __DIR__ . '/../users_class/Reservation.php';

class DB
{
    private static $instance;
    private PDO $PDO;
    private function __construct() {

        $host = getenv('HOST_DB');
        $dbname = getenv('NAME_DB');

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
    public function findUserByPassword(string $email, string $password): ?User
    {
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
            $reservation = $this->findReservationFromUserID($res["ID_UTILISATEUR"]);
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
    public function addCookie(User $user, bool $isSession = false): ?string
    {

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
    public function findUserByCookie(string $cookie, bool $isSession = false): ?User
    {
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
            $reservation = $this->findReservationFromUserID($res["ID_UTILISATEUR"]);
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
     * Permet de récupérer une réservation associé à un utilisateur via son ID.
     *
     * @param string $userID L'identifiant de l'utilisateur dont on veut la réservation
     *
     * @return Reservation|null Retourne un objet User si un est trové, sinon retourne null.
     */
    public function findReservationFromUserID(string $userID): ?Reservation
    {
        $req = $this->PDO->prepare(
            "SELECT
    RESERVATION.DATE_DE_RESERVATION,
    RESERVATION.ID_RESERVATION,
    PARTICIPANT.TARIF
FROM
    RESERVATION
INNER JOIN
    PARTICIPANT ON
        RESERVATION.ID_RESERVATION = PARTICIPANT.ID_RESERVATION
WHERE
    RESERVATION.ID_UTILISATEUR = :userID;"
        );
        $req->bindParam(':userID', $userID, PDO::PARAM_INT);
        if($req->execute()  && $req->rowCount() > 0){
            $res = $req->fetchAll(PDO::FETCH_ASSOC);
            $reservation = new Reservation($res[0]["DATE_DE_RESERVATION"], $res[0]["ID_RESERVATION"]);
            foreach ($res as $participant) {
                $reservation->addParticipant($participant["TARIF"]);
            }
            return $reservation;
        }
        else return null;
    }

    /**
     * Supprime un utilisateur à la base de données et toutes ses données associées.
     *
     * @param int $userID L'identifiant de l'utilisateur dont on veut la réservation
     *
     * @return bool Retourne true si la suppression réussit, sinon retourne false
     */
    public function removeUserFromUserID(int $userID): bool
    {
        // supprimer ses cookies
        // supprimer les participants de sa réservation
        // supprimer sa réservation
        // supprimer l'utilisateur
        $req = $this->PDO->prepare("
            	DELETE FROM COOKIE WHERE `ID_UTILISATEUR` = :userID;
                DELETE FROM PARTICIPANT WHERE `ID_RESERVATION` IN (SELECT `ID_RESERVATION` FROM RESERVATION WHERE `ID_UTILISATEUR` = :userID);
                DELETE FROM RESERVATION WHERE `ID_UTILISATEUR` = :userID;
                DELETE FROM UTILISATEUR WHERE `ID_UTILISATEUR` = :userID;
            "
        );
        $req->bindParam(':userID', $userID, PDO::PARAM_INT);
        // verrifie si une des requetes à retourné qq chose
        $req->execute();
        do {
            if ($req->rowCount() > 0) {
                return true;
            }
        } while ($req->nextRowset());
        return false;
    }

    /**
     * Permet de récupérer les ID, mail et username des 5 premiers utilisateurs selon une recherche à partir d'un email
     *
     * @param string $email L'adresse email de l'utilisateur à rechercher
     *
     * @return Array|null Retourne un tableau a de te tableau associatifs si au moin 1 utilisateur est trouvé, sinon retourne null.
     */
    public function findUserIDByMail(string $email): ?Array
    {
        $email = "%".$email."%";
        $req = $this->PDO->prepare(
            "SELECT `ID_UTILISATEUR`, `EMAIL`, `USERNAME` FROM `UTILISATEUR`
                    WHERE `EMAIL` LIKE :email LIMIT 5;"
        );
        $req->bindParam(':email', $email);
        $req->execute();
        $res = $req->fetchAll(PDO::FETCH_ASSOC);
        if($res != null){
            return $res;
        }
        else return null;
    }

    /**
     * Permet de modifier l'email d'un utilisateur à partir de son ID
     *
     * @param int $userID L'identifiant de l'utilisateur à modifier
     * @param string $newMail Le nouvel email de l'utilisateur
     *
     * @return bool Retourne true si la modification réussit, sinon retourne false.
     */
    public function editMailUserByID(int $userID, string $newMail): bool
    {
        $req = $this->PDO->prepare(
            "UPDATE `UTILISATEUR` SET `EMAIL` = :newMail WHERE `UTILISATEUR`.`ID_UTILISATEUR` = :userID;"
        );
        $req->bindParam(':newMail', $newMail);
        $req->bindParam(':userID', $userID);
        $req->execute();
        return $req->rowCount() > 0;
    }

    /**
     * Ajoute un ticket à une réservation d'un utilisateur en créant une réservation si aucune n'existe. Et en mettant a jour la date de réservation.
     *
     * @param int $quantity La quantité de ticket à ajouter.
     * @param float $price Le prix d'un ticket de la réservation.
     * @param string $userID L'id de l'utilisateur lié a la réservation.
     *
     * @return bool Retourne true si l'ajout réussit, sinon retourne false.
     */
    public function addTicketToAccount(int $quantity, float $price, string $userID): bool
    {
        if($quantity < 1 || $price < 0){
            return false;
        }

        // vérifie si l'utilisateur a une réservation
        $req = $this->PDO->prepare(
            "SELECT `ID_RESERVATION` FROM `RESERVATION` WHERE `ID_UTILISATEUR` = :userID;"
        );
        $req->bindParam(':userID', $userID, PDO::PARAM_INT);
        $req->execute();
        $res = $req->fetch(PDO::FETCH_ASSOC);

        // si il n'en a pas, on en crée un et on récupère son ID
        if($res == null){
            $req = $this->PDO->prepare(
                "INSERT INTO `RESERVATION` (`ID_UTILISATEUR`) VALUES (:userID);
SELECT `ID_RESERVATION` FROM `RESERVATION` WHERE `ID_UTILISATEUR` = :userID;"
            );
            $req->bindParam(':userID', $userID, PDO::PARAM_INT);
            $req->execute();
            $req->nextRowset();
            $res = $req->fetch(PDO::FETCH_ASSOC);
            if($res == null){
                return false;
            }
        }
        // sinon updater la date de réservation
        else {
            $req = $this->PDO->prepare(
                "UPDATE `RESERVATION` SET `DATE_DE_RESERVATION` = CURRENT_DATE WHERE `ID_UTILISATEUR` = :userID;"
            );
            $req->bindParam(':userID', $userID);
            $req->execute();
        }

        // on supprime tout les ticket du même prix et du meme id de réservation
        $req = $this->PDO->prepare(
            "DELETE FROM `PARTICIPANT` WHERE `ID_RESERVATION` = :reservationID AND `TARIF` = :price;"
        );
        $req->bindParam(':reservationID', $res["ID_RESERVATION"], PDO::PARAM_INT);
        $req->bindParam(':price', $price);
        $req->execute();

        $reqFinal = "INSERT INTO `PARTICIPANT` (`ID_RESERVATION`, `TARIF`) VALUES (:reservationID, :price);";
        //boucle allant de 0 à quantity
        for ($i = 1; $i < $quantity; $i++) {
            $reqFinal .= "INSERT INTO `PARTICIPANT` (`ID_RESERVATION`, `TARIF`) VALUES (:reservationID, :price);";
        }
        // on ajoute les tickets à la réservation
        $req = $this->PDO->prepare($reqFinal);
        $req->bindParam(':reservationID', $res["ID_RESERVATION"], PDO::PARAM_INT);
        $req->bindParam(':price', $price);
        $req->execute();

        return $req->rowCount() > 0;
    }
}