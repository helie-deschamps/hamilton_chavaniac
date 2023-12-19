<?php

include_once __DIR__ . '/Reservation.php';

/**
 * Class User
 * Représente un utilisateur.
 *
 * @property int $id L'identifiant de l'utilisateur.
 * @property string $email L'adresse email de l'utilisateur.
 * @property Reservation|null $reservation La reservation de l'utilisateur (null si non existante).
 * @property string $username Le nom d'utilisateur.
 * @property int $code_icone Le code de l'icone de l'utilisateur.
 */
class User
{
    /**
     * @var int L'identifiant de l'utilisateur.
     */
    public int $id;
    /**
     * @var string L'adresse email de l'utilisateur.
     */
    public string $email;
    /**
     * @var Reservation|null La reservation de l'utilisateur (null si non existante).
     */
    public Reservation|null $reservation;
    /**
     * @var string Le nom d'utilisateur.
     */
    public string $username;
    /**
     * @var int Le code de l'icone de l'utilisateur.
     */
    public int $code_icone;

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

    public function JSONify() {
        // crée une copie modifiable de this
        $this2 = json_decode(json_encode($this));
        $this2->reservation = $this2->reservation = null ? $this2->reservation->tableauDePrix(true) : null;
        return json_encode($this2);
    }
}