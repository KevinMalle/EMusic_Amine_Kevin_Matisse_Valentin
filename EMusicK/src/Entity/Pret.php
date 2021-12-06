<?php

namespace App\Entity;

use App\Repository\PretRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PretRepository::class)
 */
class Pret
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
    private $dateDebut;

    /**
     * @ORM\Column(type="date")
     */
    private $dateFin;

    /**
     * @ORM\OneToMany(targetEntity=Eleve::class, mappedBy="pret")
     */
    private $eleves;

    /**
     * @ORM\ManyToOne(targetEntity=Instrument::class, inversedBy="prets")
     */
    private $instrument;

    /**
     * @ORM\OneToMany(targetEntity=InterPret::class, mappedBy="pret")
     */
    private $interPret;

    public function __construct()
    {
        $this->eleves = new ArrayCollection();
        $this->interPret = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTimeInterface $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }

    public function setDateFin(\DateTimeInterface $dateFin): self
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * @return Collection|Eleve[]
     */
    public function getEleves(): Collection
    {
        return $this->eleves;
    }

    public function addElefe(Eleve $elefe): self
    {
        if (!$this->eleves->contains($elefe)) {
            $this->eleves[] = $elefe;
            $elefe->setPret($this);
        }

        return $this;
    }

    public function removeElefe(Eleve $elefe): self
    {
        if ($this->eleves->removeElement($elefe)) {
            // set the owning side to null (unless already changed)
            if ($elefe->getPret() === $this) {
                $elefe->setPret(null);
            }
        }

        return $this;
    }

    public function getInstrument(): ?Instrument
    {
        return $this->instrument;
    }

    public function setInstrument(?Instrument $instrument): self
    {
        $this->instrument = $instrument;

        return $this;
    }

    /**
     * @return Collection|InterPret[]
     */
    public function getInterPret(): Collection
    {
        return $this->interPret;
    }

    public function addInterPret(InterPret $interPret): self
    {
        if (!$this->interPret->contains($interPret)) {
            $this->interPret[] = $interPret;
            $interPret->setPret($this);
        }

        return $this;
    }

    public function removeInterPret(InterPret $interPret): self
    {
        if ($this->interPret->removeElement($interPret)) {
            // set the owning side to null (unless already changed)
            if ($interPret->getPret() === $this) {
                $interPret->setPret(null);
            }
        }

        return $this;
    }
}
