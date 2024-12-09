<?php

namespace App\Entity;

use App\Repository\AlbumPhotoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AlbumPhotoRepository::class)]
class AlbumPhoto
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\Column]
    private ?int $nombreDePage = null;

    #[ORM\Column(length: 10)]
    private ?string $etat = null;

    #[ORM\Column]
    private ?int $nombreDePhotos = null;

    #[ORM\Column(length: 50)]
    private ?string $dimensions = null;

    #[ORM\Column]
    private ?float $prixParPage = null;

    #[ORM\Column(length: 255)]
    private ?string $Marque = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getNombreDePage(): ?int
    {
        return $this->nombreDePage;
    }

    public function setNombreDePage(int $nombreDePage): static
    {
        $this->nombreDePage = $nombreDePage;

        return $this;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): static
    {
        $this->etat = $etat;

        return $this;
    }

    public function getNombreDePhotos(): ?int
    {
        return $this->nombreDePhotos;
    }

    public function setNombreDePhotos(int $nombreDePhotos): static
    {
        $this->nombreDePhotos = $nombreDePhotos;

        return $this;
    }

    public function getDimensions(): ?string
    {
        return $this->dimensions;
    }

    public function setDimensions(string $dimensions): static
    {
        $this->dimensions = $dimensions;

        return $this;
    }

    public function getPrixParPage(): ?float
    {
        return $this->prixParPage;
    }

    public function setPrixParPage(float $prixParPage): static
    {
        $this->prixParPage = $prixParPage;

        return $this;
    }

    public function getMarque(): ?string
    {
        return $this->Marque;
    }

    public function setMarque(string $Marque): static
    {
        $this->Marque = $Marque;

        return $this;
    }
}
