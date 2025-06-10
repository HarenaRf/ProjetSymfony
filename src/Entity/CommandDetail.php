<?php

namespace App\Entity;

use App\Repository\CommandDetailRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommandDetailRepository::class)]
class CommandDetail
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'commandDetails')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Commande $id_cmd = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Menu $id_item = null;

    #[ORM\Column]
    private ?int $quantite = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdCmd(): ?Commande
    {
        return $this->id_cmd;
    }

    public function setIdCmd(?Commande $id_cmd): static
    {
        $this->id_cmd = $id_cmd;

        return $this;
    }

    public function getIdItem(): ?Menu
    {
        return $this->id_item;
    }

    public function setIdItem(?Menu $id_item): static
    {
        $this->id_item = $id_item;

        return $this;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): static
    {
        $this->quantite = $quantite;

        return $this;
    }
}
