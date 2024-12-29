<?php

namespace App\Entity;

use App\Repository\EtudiantsRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EtudiantsRepository::class)]
class Etudiants
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nom = null;

    #[ORM\Column(length: 50)]
    private ?string $prenom = null;

    #[ORM\Column(type: 'date')]
    private ?\DateTimeInterface $ddn = null;

    #[ORM\Column(length: 10)]
    private ?string $gerne = null;

    #[ORM\Column(type: 'float')]
    private ?float $noteexeta = null; // Note de l'examen

    #[ORM\ManyToOne(inversedBy: 'etudiants')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Classe $classe = null;

    private Collection $inscriptions;

    public function __construct()
    {
        $this->inscriptions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;
        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;
        return $this;
    }

    public function getDdn(): ?\DateTimeInterface
    {
        return $this->ddn;
    }

    public function setDdn(\DateTimeInterface $ddn): static
    {
        $this->ddn = $ddn;
        return $this;
    }

    public function getGerne(): ?string
    {
        return $this->gerne;
    }

    public function setGerne(string $gerne): static
    {
        $this->gerne = $gerne;
        return $this;
    }

    public function getNoteexeta(): ?float
    {
        return $this->noteexeta;
    }

    public function setNoteexeta(?float $noteexeta): static
    {
        $this->noteexeta = $noteexeta;
        return $this;
    }

    public function getClasse(): ?Classe
    {
        return $this->classe;
    }

    public function setClasse(?Classe $classe): static
    {
        $this->classe = $classe;
        return $this;
    }

    public function getInscriptions(): Collection
    {
        return $this->inscriptions;
    }
}
