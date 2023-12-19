<?php

include_once __DIR__ . '/Participants.php';

/**
 * Class Reservation
 * Représente une réservation et les participants associés.
 *
 * @property Participants[] $participants Liste des participants à la réservation.
 * @property string $dateOfReservation La date de la réservation.
 * @property string $NameOfReservation Le nom asocié à la réservation.
 */
class Reservation
{
    /**
     * @var Participants[] Les participants à la réservation.
     */
    public array $participants;
    /**
     * @var string La date de la réservation.
     */
    public string $dateOfReservation;
    /**
     * @var string Le nom asocié à la réservation.
     */
    public string $NameOfReservation;

    /**
     * @param Participants[] $participants Les participants à la réservation.
     * @param string $dateOfReservation La date de la réservation.
     * @param string $NameOfReservation Le nom asocié à la réservation.
     */
    public function __construct(string $dateOfReservation, string $NameOfReservation, array $participants = []) {
        $this->participants = $participants;
        $this->dateOfReservation = $dateOfReservation;
        $this->NameOfReservation = $NameOfReservation;
    }

    /**
     * Ajoute un participant à la réservation.
     *
     * @param float $price Le prix du participant à ajouter.
     *
     * @return void
     */
    public function addParticipant(float $price): void {
        $this->participants[] = new Participants($price);
    }

    /**
     * Ajoute un participant à la réservation.
     *
     * @param bool $inJSON Indique si le tableau doit être retourné en JSON ou non.
     *
     * @return array[]|string Un tableau contenant les prix des participants avec la structure suivante.
     * [ [ prix (float), nombre de participants a ce prix (int) ], ... ]
     * exemple:
     * [ [ 12.5, 2 ], [ 10, 1 ], [ 7, 2 ] ]
     */
    public function tableauDePrix($inJSON = false): array|string
    {
        // trie les participant par prix dans un nouveau tableau du modele [ [ prix (float), nombre de participants a ce prix (int) ], ... ]
        $participantsTrie = [];
        foreach ($this->participants as $participant) {
            $participantsTrie[$participant->price][] = $participant;
        }
        $participantsTrieResult = [];
        foreach ($participantsTrie as $price => $participants) {
            $participantsTrieResult[] = [$price, count($participants)];
        }
        return $inJSON ? json_encode($participantsTrieResult) : $participantsTrieResult;
    }
}