<?php

namespace App\Entity;

use App\Repository\FaculitesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FaculitesRepository::class)]
class Faculites
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 60)]
    private ?string $nomf = null;

    #[ORM\Column(length: 10)]
    private ?string $codef = null;

    #[ORM\OneToMany(mappedBy: 'faculite', targetEntity: Departements::class)]
    private Collection $departements; // Collection de départements

    public function __construct()
    {
        $this->departements = new ArrayCollection(); // Initialisation de la collection
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomf(): ?string
    {
        return $this->nomf;
    }

    public function setNomf(string $nomf): static
    {
        $this->nomf = $nomf;
        return $this;
    }

    public function getCodef(): ?string
    {
        return $this->codef;
    }

    public function setCodef(string $codef): static
    {
        $this->codef = $codef;
        return $this;
    }

    /**
     * @return Collection<int, Departements>
     */
    public function getDepartements(): Collection
    {
        return $this->departements;
    }

    public function addDepartement(Departements $departement): static
    {
        if (!$this->departements->contains($departement)) {
            $this->departements->add($departement);
            $departement->setFaculite($this);
        }

        return $this;
    }

    public function removeDepartement(Departements $departement): static
    {
        if ($this->departements->removeElement($departement)) {
            // Set the owning side to null (unless already changed)
            if ($departement->getFaculite() === $this) {
                $departement->setFaculite(null);
            }
        }

        return $this;
    }
}
