<?php

namespace App\Entity;

use App\Repository\InscriptionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InscriptionRepository::class)
 */
class Inscription
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
    private $NombreDePaiements;

    /**
     * @ORM\ManyToOne(targetEntity=Eleve::class, inversedBy="inscriptions")
     */
    private $eleve;

    /**
     * @ORM\ManyToOne(targetEntity=Cours::class, inversedBy="inscriptions")
     */
    private $cours;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombreDePaiements(): ?int
    {
        return $this->NombreDePaiements;
    }

    public function setNombreDePaiements(int $NombreDePaiements): self
    {
        $this->NombreDePaiements = $NombreDePaiements;

        return $this;
    }

    public function getEleve(): ?Eleve
    {
        return $this->eleve;
    }

    public function setEleve(?Eleve $eleve): self
    {
        $this->eleve = $eleve;

        return $this;
    }

    public function getCours(): ?Cours
    {
        return $this->cours;
    }

    public function setCours(?Cours $cours): self
    {
        $this->cours = $cours;

        return $this;
    }
}
