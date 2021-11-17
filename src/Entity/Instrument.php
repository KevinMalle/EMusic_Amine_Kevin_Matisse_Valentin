<?php

namespace App\Entity;

use App\Repository\InstrumentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InstrumentRepository::class)
 */
class Instrument
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
    private $intitule;

    /**
     * @ORM\Column(type="float")
     */
    private $prixDachat;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Marque;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $couleurDominante;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $NumeroDeSerie;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Utilisation;

    /**
     * @ORM\OneToMany(targetEntity=Accessoir::class, mappedBy="instrument")
     */
    private $accessoirs;

    /**
     * @ORM\ManyToOne(targetEntity=TypeInstrument::class, inversedBy="instruments")
     */
    private $typeInstrument;

    /**
     * @ORM\ManyToOne(targetEntity=Intervention::class, inversedBy="instruments")
     */
    private $intervention;

    public function __construct()
    {
        $this->accessoirs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIntitule(): ?string
    {
        return $this->intitule;
    }

    public function setIntitule(string $intitule): self
    {
        $this->intitule = $intitule;

        return $this;
    }

    public function getPrixDachat(): ?float
    {
        return $this->prixDachat;
    }

    public function setPrixDachat(float $prixDachat): self
    {
        $this->prixDachat = $prixDachat;

        return $this;
    }

    public function getMarque(): ?string
    {
        return $this->Marque;
    }

    public function setMarque(string $Marque): self
    {
        $this->Marque = $Marque;

        return $this;
    }

    public function getCouleurDominante(): ?string
    {
        return $this->couleurDominante;
    }

    public function setCouleurDominante(string $couleurDominante): self
    {
        $this->couleurDominante = $couleurDominante;

        return $this;
    }

    public function getNumeroDeSerie(): ?string
    {
        return $this->NumeroDeSerie;
    }

    public function setNumeroDeSerie(string $NumeroDeSerie): self
    {
        $this->NumeroDeSerie = $NumeroDeSerie;

        return $this;
    }

    public function getUtilisation(): ?string
    {
        return $this->Utilisation;
    }

    public function setUtilisation(string $Utilisation): self
    {
        $this->Utilisation = $Utilisation;

        return $this;
    }

    /**
     * @return Collection|Accessoir[]
     */
    public function getAccessoirs(): Collection
    {
        return $this->accessoirs;
    }

    public function addAccessoir(Accessoir $accessoir): self
    {
        if (!$this->accessoirs->contains($accessoir)) {
            $this->accessoirs[] = $accessoir;
            $accessoir->setInstrument($this);
        }

        return $this;
    }

    public function removeAccessoir(Accessoir $accessoir): self
    {
        if ($this->accessoirs->removeElement($accessoir)) {
            // set the owning side to null (unless already changed)
            if ($accessoir->getInstrument() === $this) {
                $accessoir->setInstrument(null);
            }
        }

        return $this;
    }

    public function getTypeInstrument(): ?TypeInstrument
    {
        return $this->typeInstrument;
    }

    public function setTypeInstrument(?TypeInstrument $typeInstrument): self
    {
        $this->typeInstrument = $typeInstrument;

        return $this;
    }

    public function getIntervention(): ?Intervention
    {
        return $this->intervention;
    }

    public function setIntervention(?Intervention $intervention): self
    {
        $this->intervention = $intervention;

        return $this;
    }
}
