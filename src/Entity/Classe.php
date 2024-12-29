<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use App\Repository\ClasseRepository;

#[ORM\Entity(repositoryClass: ClasseRepository::class)]
class Classe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $niveau = null;

    #[ORM\ManyToOne(targetEntity: Departements::class, inversedBy: 'classes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Departements $departement = null;

    #[ORM\OneToMany(mappedBy: 'classe', targetEntity: Inscriptions::class)]
    private Collection $inscriptions;

    public function __construct()
    {
        $this->inscriptions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNiveau(): ?string
    {
        return $this->niveau;
    }

    public function setNiveau(string $niveau): static
    {
        $this->niveau = $niveau;
        return $this;
    }

    public function getDepartement(): ?Departements
    {
        return $this->departement;
    }

    public function setDepartement(?Departements $departement): static
    {
        $this->departement = $departement;
        return $this;
    }

    public function getInscriptions(): Collection
    {
        return $this->inscriptions;
    }

    public function getNomc(): ?string
    {
        // Assurez-vous que cette méthode retourne le nom de la classe ou une propriété similaire
        return $this->niveau; // Exemple de retour de niveau comme nom de la classe
    }

    public function setNomc(?string $nomc): static
    {
        // Cette méthode est optionnelle si vous ne définissez pas `nomc` comme propriété
        $this->niveau = $nomc; // Exemple de définition du niveau comme nom de la classe
        return $this;
    }
}
