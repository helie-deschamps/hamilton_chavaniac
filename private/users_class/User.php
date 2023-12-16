<?php

include_once 'Reservation.php';

class User
{
    public $id;
    public $email;
    public $reservation;
    public $username;
    public $code_icone;

    /**
     * @param int $id L'identifiant de l'utilisateur.
     * @param string $email L'adresse email de l'utilisateur.
     * @param Reservation|null $reservation La reservation de l'utilisateur (null si non existante).
     * @param string $username Le nom d'utilisateur.
     * @param int $code_icone Le code de l'icone de l'utilisateur.
     */
    public function __construct(int $id, string $email, Reservation|null $reservation, string $username, int $code_icone) {
        $this->id = $id;
        $this->email = $email;
        $this->reservation = $reservation;
        $this->username = $username;
        $this->code_icone = $code_icone;
    }
}