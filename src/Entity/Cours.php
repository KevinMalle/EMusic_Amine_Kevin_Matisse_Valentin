<?php

namespace App\Entity;

use App\Repository\CoursRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CoursRepository::class)
 */
class Cours
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $ageMini;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libelle;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $agePlaceMaxi;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nbPlaceMaxi;

    /**
     * @ORM\ManyToOne(targetEntity=Professeur::class, inversedBy="cours")
     */
    private $professeur;

    /**
     * @ORM\ManyToOne(targetEntity=Jour::class, inversedBy="cours")
     */
    private $jour;

    /**
     * @ORM\ManyToOne(targetEntity=TypeInstrument::class, inversedBy="cours")
     */
    private $typeInstrument;

    /**
     * @ORM\OneToMany(targetEntity=Inscription::class, mappedBy="cours")
     */
    private $inscriptions;

    /**
     * @ORM\OneToMany(targetEntity=Couter::class, mappedBy="cours")
     */
    private $couters;

    public function __construct()
    {
        $this->inscriptions = new ArrayCollection();
        $this->couters = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAgeMini(): ?int
    {
        return $this->ageMini;
    }

    public function setAgeMini(int $ageMini): self
    {
        $this->ageMini = $ageMini;

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

    public function getAgePlaceMaxi(): ?int
    {
        return $this->agePlaceMaxi;
    }

    public function setAgePlaceMaxi(?int $agePlaceMaxi): self
    {
        $this->agePlaceMaxi = $agePlaceMaxi;

        return $this;
    }

    public function getNbPlaceMaxi(): ?int
    {
        return $this->nbPlaceMaxi;
    }

    public function setNbPlaceMaxi(?int $nbPlaceMaxi): self
    {
        $this->nbPlaceMaxi = $nbPlaceMaxi;

        return $this;
    }

    public function getProfesseur(): ?Professeur
    {
        return $this->professeur;
    }

    public function setProfesseur(?Professeur $professeur): self
    {
        $this->professeur = $professeur;

        return $this;
    }

    public function getJour(): ?Jour
    {
        return $this->jour;
    }

    public function setJour(?Jour $jour): self
    {
        $this->jour = $jour;

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

    /**
     * @return Collection|Inscription[]
     */
    public function getInscriptions(): Collection
    {
        return $this->inscriptions;
    }

    public function addInscription(Inscription $inscription): self
    {
        if (!$this->inscriptions->contains($inscription)) {
            $this->inscriptions[] = $inscription;
            $inscription->setCours($this);
        }

        return $this;
    }

    public function removeInscription(Inscription $inscription): self
    {
        if ($this->inscriptions->removeElement($inscription)) {
            // set the owning side to null (unless already changed)
            if ($inscription->getCours() === $this) {
                $inscription->setCours(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Couter[]
     */
    public function getCouters(): Collection
    {
        return $this->couters;
    }

    public function addCouter(Couter $couter): self
    {
        if (!$this->couters->contains($couter)) {
            $this->couters[] = $couter;
            $couter->setCours($this);
        }

        return $this;
    }

    public function removeCouter(Couter $couter): self
    {
        if ($this->couters->removeElement($couter)) {
            // set the owning side to null (unless already changed)
            if ($couter->getCours() === $this) {
                $couter->setCours(null);
            }
        }

        return $this;
    }
}
