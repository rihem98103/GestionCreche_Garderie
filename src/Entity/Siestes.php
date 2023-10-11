<?php

namespace App\Entity;

use App\Repository\SiestesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SiestesRepository::class)
 */
class Siestes
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
    private $heurededebut;

    /**
     * @ORM\Column(type="time")
     */
    private $heurededormir;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $qualite;

    /**
     * @ORM\ManyToOne(targetEntity=Bebe::class, inversedBy="siestes")
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

    public function getHeurededebut(): ?\DateTimeInterface
    {
        return $this->heurededebut;
    }

    public function setHeurededebut(\DateTimeInterface $heurededebut): self
    {
        $this->heurededebut = $heurededebut;

        return $this;
    }

    public function getHeurededormir(): ?\DateTimeInterface
    {
        return $this->heurededormir;
    }

    public function setHeurededormir(\DateTimeInterface $heurededormir): self
    {
        $this->heurededormir = $heurededormir;

        return $this;
    }

    public function getQualite(): ?string
    {
        return $this->qualite;
    }

    public function setQualite(string $qualite): self
    {
        $this->qualite = $qualite;

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
