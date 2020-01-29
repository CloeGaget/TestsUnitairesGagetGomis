<?php
declare(strict_types=1);

final class Adherent
{
    private $prenom;
    private $nom;
    private $date;
    
    function __construct(string $nom, string $prenom, string $date) {
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->date = $date;
    }
}
