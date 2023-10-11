<?php

namespace App\Entity;

use App\Repository\BebeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BebeRepository::class)
 */
class Bebe
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="date")
     */
    private $datenaissance;

    /**
     * @ORM\Column(type="integer")
     */
    private $age;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Repas", mappedBy="bebe", orphanRemoval=true)
     */
    private $repas;

    /**
     * @ORM\OneToMany(targetEntity=Siestes::class, mappedBy="bebe", orphanRemoval=true)
     */
    private $siestes;

    /**
     * @ORM\OneToMany(targetEntity=Hygiene::class, mappedBy="bebe", orphanRemoval=true)
     */
    private $hygienes;

    /**
     * @ORM\OneToMany(targetEntity=Sante::class, mappedBy="bebe", orphanRemoval=true)
     */
    private $santes;

    /**
     * @ORM\ManyToMany(targetEntity=Parents::class, mappedBy="bebe")
     */
    private $parents;



    public function __construct()
    {
        $this->repas = new ArrayCollection();
        $this->siestes = new ArrayCollection();
        $this->hygienes = new ArrayCollection();
        $this->santes = new ArrayCollection();
        $this->parents = new ArrayCollection();
      
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

    public function getDatenaissance(): ?\DateTimeInterface
    {
        return $this->datenaissance;
    }

    public function setDatenaissance(\DateTimeInterface $datenaissance): self
    {
        $this->datenaissance = $datenaissance;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    /**
     * @return Collection|Repas[]
     */
    public function getRepas(): Collection
    {
        return $this->repas;
    }

    public function addRepa(Repas $repa): self
    {
        if (!$this->repas->contains($repa)) {
            $this->repas[] = $repa;
            $repa->setBebe($this);
        }

        return $this;
    }

    public function removeRepa(Repas $repa): self
    {
        if ($this->repas->removeElement($repa)) {
            // set the owning side to null (unless already changed)
            if ($repa->getBebe() === $this) {
                $repa->setBebe(null);
            }
        }

        return $this;
    }
  /**
    * toString
    * @return string
    */
    public function __toString() {
        return $this->getPrenom();
    }

    /**
     * @return Collection|Siestes[]
     */
    public function getSiestes(): Collection
    {
        return $this->siestes;
    }

    public function addSieste(Siestes $sieste): self
    {
        if (!$this->siestes->contains($sieste)) {
            $this->siestes[] = $sieste;
            $sieste->setBebe($this);
        }

        return $this;
    }

    public function removeSieste(Siestes $sieste): self
    {
        if ($this->siestes->removeElement($sieste)) {
            // set the owning side to null (unless already changed)
            if ($sieste->getBebe() === $this) {
                $sieste->setBebe(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Hygiene[]
     */
    public function getHygienes(): Collection
    {
        return $this->hygienes;
    }

    public function addHygiene(Hygiene $hygiene): self
    {
        if (!$this->hygienes->contains($hygiene)) {
            $this->hygienes[] = $hygiene;
            $hygiene->setBebe($this);
        }

        return $this;
    }

    public function removeHygiene(Hygiene $hygiene): self
    {
        if ($this->hygienes->removeElement($hygiene)) {
            // set the owning side to null (unless already changed)
            if ($hygiene->getBebe() === $this) {
                $hygiene->setBebe(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Sante[]
     */
    public function getSantes(): Collection
    {
        return $this->santes;
    }

    public function addSante(Sante $sante): self
    {
        if (!$this->santes->contains($sante)) {
            $this->santes[] = $sante;
            $sante->setBebe($this);
        }

        return $this;
    }

    public function removeSante(Sante $sante): self
    {
        if ($this->santes->removeElement($sante)) {
            // set the owning side to null (unless already changed)
            if ($sante->getBebe() === $this) {
                $sante->setBebe(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Parents[]
     */
    public function getParents(): Collection
    {
        return $this->parents;
    }

    public function addParent(Parents $parent): self
    {
        if (!$this->parents->contains($parent)) {
            $this->parents[] = $parent;
            $parent->addBebe($this);
        }

        return $this;
    }

    public function removeParent(Parents $parent): self
    {
        if ($this->parents->removeElement($parent)) {
            $parent->removeBebe($this);
        }

        return $this;
    }

    


}
