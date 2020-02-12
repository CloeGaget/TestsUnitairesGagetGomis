<?php
namespace App\Tests\Entity;

use PHPUnit\Framework\TestCase;
use App\Entity\Trajet;
use App\Entity\Lieu;
use App\Entity\User;

class TrajetTest extends TestCase {
    protected $trajet;
    
    public function setUp() {
        $this->trajet = new Trajet();
    }
    
    public function testTrajet() {
        $this->assertInstanceOf(Trajet::class, $this->trajet);
        $this->assertNull($this->trajet->getId());
    }
    
    public function testTrajetPlaces() {
        $this->trajet->setPlaces(2);
        $this->assertEquals(2, $this->trajet->getPlaces());
    }
    
    public function testTrajetDateTime() {
        $date = new \DateTime();
        $this->trajet->setDateTime($date);
        $this->assertEquals($date, $this->trajet->getDateTime());
    }
    
    public function testTrajetLieuDepart() {
        $lieu = new Lieu();
        $this->trajet->setLieuDepart($lieu);
        $lieu->addDepartTrajet($this->trajet);
        $this->assertEquals($lieu, $this->trajet->getLieuDepart());
        $this->assertContains($this->trajet, $lieu->getDepartTrajets());
    }
    
    public function testTrajetLieuArrivee() {
        $lieu = new Lieu();
        $this->trajet->setLieuDepart($lieu);
        $lieu->addArriveeTrajet($this->trajet);
        $this->assertEquals($lieu, $this->trajet->getLieuArrivee());
        $this->assertContains($this->trajet, $lieu->getArriveeTrajets());
    }
    
    public function testTrajetConducteur() {
        $user = new User();
        $this->trajet->setConducteur($user);
        $user->addConducteurTrajets($this->trajet);
        $this->assertEquals($user, $this->trajet->getConducteur());
        $this->assertContains($this->trajet, $user->getConducteurTrajets());
    }
}
