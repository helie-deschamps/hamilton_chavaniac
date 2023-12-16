<?php

include_once '../users_class/User.php';
include_once '../db_gestion/DB.php';

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
     * Authentifie un utilisateur à partir de son cookie d'authentification.
     *
     * @param string $cookie La valeur du cookie d'authentification de l'utilisateur.
     *
     * @return User|null Retourne un objet User si l'authentification réussit, sinon retourne null.
     */
    public function loginWithCookie(string $cookie) {
        return $this->db->findUserByCookie($cookie);
    }

    /**
     * Authentifie un utilisateur à l'aide d'un email et d'un mot de passe, si l'authentification réussit, un cookie est ajouté à la base de données et sur le navigateur de l'utilisateur.
     *
     * @param string $email L'adresse email de l'utilisateur.
     * @param string $password Le mot de passe de l'utilisateur.
     *
     * @return User|null Retourne un objet User si l'authentification réussit, sinon retourne null.
     */
    public function loginWithEmailPassword(string $email, string $password) {
        $user = $this->db->findUserByPassword($email, $password);
        $cookie = $user != null && $this->db->addCookie($user);
        setcookie("conncusr", $cookie, time()+395*24*60*60);
        return $user;
    }
}