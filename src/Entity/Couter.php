<?php

namespace App\Entity;

use App\Repository\CouterRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CouterRepository::class)
 */
class Couter
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $montant;

    /**
     * @ORM\ManyToOne(targetEntity=Tranches::class, inversedBy="couters")
     */
    private $tranches;

    /**
     * @ORM\ManyToOne(targetEntity=Cours::class, inversedBy="couters")
     */
    private $cours;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getTranches(): ?Tranches
    {
        return $this->tranches;
    }

    public function setTranches(?Tranches $tranches): self
    {
        $this->tranches = $tranches;

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
