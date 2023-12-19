<?php

namespace App\Entity;

use App\Repository\ConsoleRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConsoleRepository::class)]
class Console
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $annee_sortie = null;

    #[ORM\Column]
    private ?float $prix_revente = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?etat $fk_etat = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?marque $fk_marque = null;

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

    public function getAnneeSortie(): ?\DateTimeInterface
    {
        return $this->annee_sortie;
    }

    public function setAnneeSortie(\DateTimeInterface $annee_sortie): static
    {
        $this->annee_sortie = $annee_sortie;

        return $this;
    }

    public function getPrixRevente(): ?float
    {
        return $this->prix_revente;
    }

    public function setPrixRevente(float $prix_revente): static
    {
        $this->prix_revente = $prix_revente;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getFkEtat(): ?etat
    {
        return $this->fk_etat;
    }

    public function setFkEtat(?etat $fk_etat): static
    {
        $this->fk_etat = $fk_etat;

        return $this;
    }

    public function getFkMarque(): ?marque
    {
        return $this->fk_marque;
    }

    public function setFkMarque(?marque $fk_marque): static
    {
        $this->fk_marque = $fk_marque;

        return $this;
    }
}
