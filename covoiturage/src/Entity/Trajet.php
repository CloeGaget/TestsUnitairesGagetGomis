<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TrajetRepository")
 */
class Trajet
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Lieu", inversedBy="trajetsDepart")
     * @ORM\JoinColumn(nullable=false)
     */
    private $lieuDepart;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Lieu", inversedBy="trajetsArrivee")
     * @ORM\JoinColumn(nullable=false)
     */
    private $lieuArrivee;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateHeure;

    /**
     * @ORM\Column(type="integer")
     */
    private $places;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="trajetsConducteur")
     * @ORM\JoinColumn(nullable=false)
     */
    private $conducteur;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\User", inversedBy="trajetsPassagers")
     */
    private $passagers;

    public function __construct()
    {
        $this->passagers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLieuDepart(): ?Lieu
    {
        return $this->lieuDepart;
    }

    public function setLieuDepart(?Lieu $lieuDepart): self
    {
        $this->lieuDepart = $lieuDepart;

        return $this;
    }

    public function getLieuArrivee(): ?Lieu
    {
        return $this->lieuArrivee;
    }

    public function setLieuArrivee(?Lieu $lieuArrivee): self
    {
        $this->lieuArrivee = $lieuArrivee;

        return $this;
    }

    public function getDateHeure(): ?\DateTimeInterface
    {
        return $this->dateHeure;
    }

    public function setDateHeure(\DateTimeInterface $dateHeure): self
    {
        $this->dateHeure = $dateHeure;

        return $this;
    }

    public function getPlaces(): ?int
    {
        return $this->places;
    }

    public function setPlaces(int $places): self
    {
        $this->places = $places;

        return $this;
    }

    public function getConducteur(): ?User
    {
        return $this->conducteur;
    }

    public function setConducteur(?User $conducteur): self
    {
        $this->conducteur = $conducteur;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getPassagers(): Collection
    {
        return $this->passagers;
    }

    public function addPassager(User $passager): self
    {
        if (!$this->passagers->contains($passager)) {
            $this->passagers[] = $passager;
        }

        return $this;
    }

    public function removePassager(User $passager): self
    {
        if ($this->passagers->contains($passager)) {
            $this->passagers->removeElement($passager);
        }

        return $this;
    }
}
