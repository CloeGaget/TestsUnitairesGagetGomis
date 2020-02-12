<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Trajet", mappedBy="conducteur")
     */
    private $trajetsConducteur;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Trajet", mappedBy="passagers")
     */
    private $trajetsPassagers;

    public function __construct()
    {
        $this->trajetsConducteur = new ArrayCollection();
        $this->trajetsPassagers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return Collection|Trajet[]
     */
    public function getTrajetsConducteur(): Collection
    {
        return $this->trajetsConducteur;
    }

    public function addTrajetsConducteur(Trajet $trajetsConducteur): self
    {
        if (!$this->trajetsConducteur->contains($trajetsConducteur)) {
            $this->trajetsConducteur[] = $trajetsConducteur;
            $trajetsConducteur->setConducteur($this);
        }

        return $this;
    }

    public function removeTrajetsConducteur(Trajet $trajetsConducteur): self
    {
        if ($this->trajetsConducteur->contains($trajetsConducteur)) {
            $this->trajetsConducteur->removeElement($trajetsConducteur);
            // set the owning side to null (unless already changed)
            if ($trajetsConducteur->getConducteur() === $this) {
                $trajetsConducteur->setConducteur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Trajet[]
     */
    public function getTrajetsPassagers(): Collection
    {
        return $this->trajetsPassagers;
    }

    public function addTrajetsPassager(Trajet $trajetsPassager): self
    {
        if (!$this->trajetsPassagers->contains($trajetsPassager)) {
            $this->trajetsPassagers[] = $trajetsPassager;
            $trajetsPassager->addPassager($this);
        }

        return $this;
    }

    public function removeTrajetsPassager(Trajet $trajetsPassager): self
    {
        if ($this->trajetsPassagers->contains($trajetsPassager)) {
            $this->trajetsPassagers->removeElement($trajetsPassager);
            $trajetsPassager->removePassager($this);
        }

        return $this;
    }
}
