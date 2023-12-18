<?php

include_once __DIR__ . '/Participants.php';

class Reservation
{
    //todo: crée cette classe
    public $participants;
    public $dateOfReservation;
    public $NameOfReservation;

    /**
     * @param Participants[] $participants Les participants à la réservation.
     * @param string $dateOfReservation La date de la réservation.
     * @param string $NameOfReservation Le nom asocié à la réservation.
     */
    public function __construct(array $participants, string $dateOfReservation, string $NameOfReservation) {
        $this->participants = $participants;
        $this->dateOfReservation = $dateOfReservation;
        $this->NameOfReservation = $NameOfReservation;
    }
}