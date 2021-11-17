<?php

namespace App\Entity;

use App\Repository\TranchesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TranchesRepository::class)
 */
class Tranches
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
    private $quotientMin;

    /**
     * @ORM\OneToMany(targetEntity=Couter::class, mappedBy="tranches")
     */
    private $couters;

    public function __construct()
    {
        $this->couters = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuotientMin(): ?int
    {
        return $this->quotientMin;
    }

    public function setQuotientMin(int $quotientMin): self
    {
        $this->quotientMin = $quotientMin;

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
            $couter->setTranches($this);
        }

        return $this;
    }

    public function removeCouter(Couter $couter): self
    {
        if ($this->couters->removeElement($couter)) {
            // set the owning side to null (unless already changed)
            if ($couter->getTranches() === $this) {
                $couter->setTranches(null);
            }
        }

        return $this;
    }
}
