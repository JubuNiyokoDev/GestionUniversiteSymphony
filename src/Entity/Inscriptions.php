<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\InscriptionsRepository;

#[ORM\Entity(repositoryClass: InscriptionsRepository::class)]
class Inscriptions
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Classe::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?Classe $classe = null;

    #[ORM\ManyToOne(targetEntity: Etudiants::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?Etudiants $etudiant = null;

    #[ORM\Column(length: 50)]
    private ?string $anneacademique = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClasse(): ?Classe
    {
        return $this->classe;
    }

    public function setClasse(?Classe $classe): self
    {
        $this->classe = $classe;
        return $this;
    }

    public function getEtudiant(): ?Etudiants
    {
        return $this->etudiant;
    }

    public function setEtudiant(?Etudiants $etudiant): self
    {
        $this->etudiant = $etudiant;
        return $this;
    }

    public function getAnneacademique(): ?string
    {
        return $this->anneacademique;
    }

    public function setAnneacademique(string $anneacademique): self
    {
        $this->anneacademique = $anneacademique;
        return $this;
    }
}
