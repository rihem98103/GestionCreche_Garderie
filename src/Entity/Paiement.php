<?php

namespace App\Entity;

use App\Repository\PaiementRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PaiementRepository::class)
 */
class Paiement
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cin;

    /**
     * @ORM\ManyToOne(targetEntity=Parents::class, inversedBy="paiements")
     * @ORM\JoinColumn(nullable=false)
     */
    private $nom;

    /**
     * @ORM\ManyToOne(targetEntity=Parents::class, inversedBy="paiements")
     * @ORM\JoinColumn(nullable=false)
     */
    private $prenom;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numerocarte;

    /**
     * @ORM\Column(type="float")
     */
    private $montant;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $typedepaiement;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCin(): ?string
    {
        return $this->cin;
    }

    public function setCin(string $cin): self
    {
        $this->cin = $cin;

        return $this;
    }

    public function getNom(): ?Parents
    {
        return $this->nom;
    }

    public function setNom(?Parents $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?Parents
    {
        return $this->prenom;
    }

    public function setPrenom(?Parents $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getNumerocarte(): ?string
    {
        return $this->numerocarte;
    }

    public function setNumerocarte(string $numerocarte): self
    {
        $this->numerocarte = $numerocarte;

        return $this;
    }

    public function getMontant(): ?float
    {
        return $this->montant;
    }

    public function setMontant(float $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getTypedepaiement(): ?string
    {
        return $this->typedepaiement;
    }

    public function setTypedepaiement(string $typedepaiement): self
    {
        $this->typedepaiement = $typedepaiement;

        return $this;
    }
}
