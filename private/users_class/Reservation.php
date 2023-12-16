<?php

class Reservation
{
    //todo: crée cette classe
    public $id;

    /**
     * @param int $id L'identifiant de la réservation.
     */
    public function __construct(int $id) {
        $this->id = $id;
    }
}