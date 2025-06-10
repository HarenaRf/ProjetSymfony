<?php

namespace App\Entity;

use App\Repository\MenuRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MenuRepository::class)]
class Menu
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $nom_item = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 0)]
    private ?string $prix_item = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image_path = null;

    #[ORM\ManyToOne(inversedBy: 'menus')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Categorie $id_categ = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomItem(): ?string
    {
        return $this->nom_item;
    }

    public function setNomItem(string $nom_item): static
    {
        $this->nom_item = $nom_item;

        return $this;
    }

    public function getPrixItem(): ?string
    {
        return $this->prix_item;
    }

    public function setPrixItem(string $prix_item): static
    {
        $this->prix_item = $prix_item;

        return $this;
    }

    public function getImagePath(): ?string
    {
        return $this->image_path;
    }

    public function setImagePath(?string $image_path): static
    {
        $this->image_path = $image_path;

        return $this;
    }

    public function getIdCateg(): ?Categorie
    {
        return $this->id_categ;
    }

    public function setIdCateg(?Categorie $id_categ): static
    {
        $this->id_categ = $id_categ;

        return $this;
    }
}
