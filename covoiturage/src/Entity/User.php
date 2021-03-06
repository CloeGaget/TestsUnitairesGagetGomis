<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $username;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Trajet", mappedBy="conducteur", orphanRemoval=true)
     */
    private $conducteurtrajets;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Trajet", mappedBy="passagers")
     */
    private $passagertrajets;

    public function __construct()
    {
        $this->conducteurtrajets = new ArrayCollection();
        $this->passagertrajets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
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

    /**
     * @return Collection|Trajet[]
     */
    public function getConducteurtrajets(): Collection
    {
        return $this->conducteurtrajets;
    }

    public function addConducteurtrajet(Trajet $conducteurtrajet): self
    {
        if (!$this->conducteurtrajets->contains($conducteurtrajet)) {
            $this->conducteurtrajets[] = $conducteurtrajet;
            $conducteurtrajet->setConducteur($this);
        }

        return $this;
    }

    public function removeConducteurtrajet(Trajet $conducteurtrajet): self
    {
        if ($this->conducteurtrajets->contains($conducteurtrajet)) {
            $this->conducteurtrajets->removeElement($conducteurtrajet);
            // set the owning side to null (unless already changed)
            if ($conducteurtrajet->getConducteur() === $this) {
                $conducteurtrajet->setConducteur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Trajet[]
     */
    public function getPassagertrajets(): Collection
    {
        return $this->passagertrajets;
    }

    public function addPassagertrajet(Trajet $passagertrajet): self
    {
        if (!$this->passagertrajets->contains($passagertrajet)) {
            $this->passagertrajets[] = $passagertrajet;
            $passagertrajet->addPassager($this);
        }

        return $this;
    }

    public function removePassagertrajet(Trajet $passagertrajet): self
    {
        if ($this->passagertrajets->contains($passagertrajet)) {
            $this->passagertrajets->removeElement($passagertrajet);
            $passagertrajet->removePassager($this);
        }

        return $this;
    }
}