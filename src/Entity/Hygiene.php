<?php

namespace App\Entity;

use App\Repository\HygieneRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HygieneRepository::class)
 */
class Hygiene
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="time")
     */
    private $heure;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libelle;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $soins;

    /**
     * @ORM\ManyToOne(targetEntity=Bebe::class, inversedBy="hygienes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $bebe;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getHeure(): ?\DateTimeInterface
    {
        return $this->heure;
    }

    public function setHeure(\DateTimeInterface $heure): self
    {
        $this->heure = $heure;

        return $this;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getSoins(): ?string
    {
        return $this->soins;
    }

    public function setSoins(string $soins): self
    {
        $this->soins = $soins;

        return $this;
    }

    public function getBebe(): ?Bebe
    {
        return $this->bebe;
    }

    public function setBebe(?Bebe $bebe): self
    {
        $this->bebe = $bebe;

        return $this;
    }
}
