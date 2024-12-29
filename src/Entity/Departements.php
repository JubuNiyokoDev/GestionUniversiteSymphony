<?php

namespace App\Entity;

use App\Repository\DepartementsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DepartementsRepository::class)]
class Departements
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $nomd = null;

    #[ORM\Column(length: 100)]
    private ?string $coded = null;

    #[ORM\ManyToOne(targetEntity: Faculites::class, inversedBy: 'departements')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Faculites $faculite = null;

    #[ORM\OneToMany(mappedBy: 'departement', targetEntity: Classe::class, orphanRemoval: true)]
    private Collection $classes;

    public function __construct()
    {
        $this->classes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomd(): ?string
    {
        return $this->nomd;
    }

    public function setNomd(string $nomd): static
    {
        $this->nomd = $nomd;
        return $this;
    }

    public function getCoded(): ?string
    {
        return $this->coded;
    }

    public function setCoded(string $coded): static
    {
        $this->coded = $coded;
        return $this;
    }

    public function getFaculite(): ?Faculites
    {
        return $this->faculite;
    }

    public function setFaculite(?Faculites $faculite): static
    {
        $this->faculite = $faculite;
        return $this;
    }

    /**
     * @return Collection<int, Classe>
     */
    public function getClasses(): Collection
    {
        return $this->classes;
    }

    public function addClasse(Classe $classe): static
    {
        if (!$this->classes->contains($classe)) {
            $this->classes->add($classe);
            $classe->setDepartement($this);
        }

        return $this;
    }

    public function removeClasse(Classe $classe): static
    {
        if ($this->classes->removeElement($classe)) {
            // Set the owning side to null (unless already changed)
            if ($classe->getDepartement() === $this) {
                $classe->setDepartement(null);
            }
        }

        return $this;
    }
}
