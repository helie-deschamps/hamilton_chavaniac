<?php

class Participants
{

    public $price;

    /**
     * @param float $price Le prix de la réservation.
     */
    public function __construct(float $price) {
        $this->price = $price;
    }

}