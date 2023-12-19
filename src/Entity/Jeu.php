<?php

namespace App\Entity;

use App\Repository\JeuRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: JeuRepository::class)]
class Jeu
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $annee_sortie = null;

    #[ORM\Column]
    private ?float $prix_revente = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?editeur $fk_editeur = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?etat $fk_etat = null;

    #[ORM\ManyToMany(targetEntity: console::class)]
    private Collection $piloter;

    public function __construct()
    {
        $this->piloter = new ArrayCollection();
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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

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

    public function getEditeurId(): ?editeur
    {
        return $this->editeur_id;
    }

    public function setEditeurId(?editeur $editeur_id): static
    {
        $this->editeur_id = $editeur_id;

        return $this;
    }

    public function getIdEditeur(): ?editeur
    {
        return $this->id_editeur;
    }

    public function setIdEditeur(?editeur $id_editeur): static
    {
        $this->id_editeur = $id_editeur;

        return $this;
    }

    public function getFkEditeur(): ?editeur
    {
        return $this->fk_editeur;
    }

    public function setFkEditeur(?editeur $fk_editeur): static
    {
        $this->fk_editeur = $fk_editeur;

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

    /**
     * @return Collection<int, console>
     */
    public function getPiloter(): Collection
    {
        return $this->piloter;
    }

    public function addPiloter(console $piloter): static
    {
        if (!$this->piloter->contains($piloter)) {
            $this->piloter->add($piloter);
        }

        return $this;
    }

    public function removePiloter(console $piloter): static
    {
        $this->piloter->removeElement($piloter);

        return $this;
    }
}
