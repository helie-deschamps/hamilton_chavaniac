<?php

include_once __DIR__ . '/../users_class/User.php';
include_once __DIR__ . '/../db_gestion/DB.php';

/**
 * Singleton représentant le système central permetant une connection d'utilisateur.
 */
class AuthSystem
{
    private static $instance;
    private $db;

    private function __construct() {
        $this->db = DB::getInstance();
    }

    /**
     * @return AuthSystem Retourne l'instance unique de AuthSystem, en la créant si elle n'existe pas.
     */
    public static function getInstance() {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * @return DB Retourne l'objet DB associé a l'auth system.
     */
    public function getDB(): DB {
        return $this->db;
    }

    /**
     * Authentifie un utilisateur à partir de son cookie d'authentification.
     *
     * @param string $cookie La valeur du cookie d'authentification de l'utilisateur.
     *
     * @return User|null Retourne un objet User si l'authentification réussit, sinon retourne null.
     */
    public function loginWithCookie(string $cookie): ?User {
        return $this->db->findUserByCookie($cookie);
    }

    /**
     * Authentifie un utilisateur à partir de son cookie de session.
     *
     * @param string $cookie La valeur du cookie de session de l'utilisateur.
     *
     * @return User|null Retourne un objet User si l'authentification réussit, sinon retourne null.
     */
    public function loginWithSession(string $cookie): ?User {
        return $this->db->findUserByCookie($cookie, true);
    }

    /**
     * Authentifie un utilisateur à l'aide d'un email et d'un mot de passe, si l'authentification réussit, un cookie est ajouté à la base de données et sur le navigateur de l'utilisateur.
     *
     * @param string $email L'adresse email de l'utilisateur.
     * @param string $password Le mot de passe de l'utilisateur.
     *
     * @return User|null Retourne un objet User si l'authentification réussit, sinon retourne null.
     */
    public function loginWithEmailPassword(string $email, string $password, bool $cookieAccepted = false): ?User {
        $user = $this->db->findUserByPassword($email, $password);

        if($cookieAccepted && $user != null) {
            $cookie = $this->db->addCookie($user);
            setcookie("conncusr", $cookie, time()+395*24*60*60); // 395 jours
        }
        else if($user != null){
            $cookie = $this->db->addCookie($user, true);
            $_SESSION["connsessco"]=$cookie;
        }

        return $user;
    }

    /**
     * Crée un utilisateur à partir d'un email, d'un nom d'utilisateur, d'un mot de passe et d'un code d'icone.
     *
     * @param string $email L'adresse email de l'utilisateur.
     * @param string $username Le nom d'utilisateur de l'utilisateur.
     * @param string $password Le mot de passe de l'utilisateur.
     * @param int $codeIcone Le code de l'icone de l'utilisateur.
     *
     * @return bool Retourne true si l'ajout réussit, sinon retourne false.
     */
    public function createUser(string $email, string $username, string $password, int $codeIcone): bool {
        return $this->db->addUser($email, $username, $password, $codeIcone);
    }

    /**
     * Vérifie si un email est valide.
     *
     * @param string $email L'adresse email à vérifier.
     *
     * @return bool Retourne true si l'email est valide, sinon retourne false.
     */
    public function verifMail(string $email): bool {
        return (bool)filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    /**
     * Vérifie si un nom d'utilisateur est valide.
     *
     * @param string $username Le nom d'utilisateur à vérifier.
     *
     * @return bool Retourne true si le nom d'utilisateur est valide, sinon retourne false.
     */
    public function verifUsername(string $username): bool {
        return (strlen($username) <= 84 && (bool)preg_match("/^[a-zA-Z\s\-]+$/", $username));
    }

    /**
     * Vérifie si un mot de passe est valide.
     *
     * @param string $password Le mot de passe à vérifier.
     *
     * @return string|bool Retourne true si le mot de passe est valide, sinon retourne la raison de son invalidité.
     */
    public function verifPassword(string $password): string|bool {
        $longueur = strlen($password);
        if ($longueur < 7 || $longueur > 200) {
            return "Le mot de passe doit contenir entre 7 et 200 caractères.";
        }

        // Vérifier s'il contient au moins une lettre minuscule
        if (!preg_match('/[a-z]/', $password)) {
            return "Le mot de passe doit contenir au moins une lettre minuscule.";
        }

        // Vérifier s'il contient au moins une lettre majuscule
        if (!preg_match('/[A-Z]/', $password)) {
            return "Le mot de passe doit contenir au moins une lettre majuscule.";
        }

        return true;
    }
}