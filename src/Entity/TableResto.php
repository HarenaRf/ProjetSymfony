<?php

namespace App\Entity;

use App\Repository\TableRestoRepository;
use App\Enum\EtatTable;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TableRestoRepository::class)]
class TableResto
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $num_table = null;

    #[ORM\Column]
    private ?int $capacite = null;

    #[ORM\Column(enumType: EtatTable::class)]
    private ?EtatTable $etat_table = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumTable(): ?int
    {
        return $this->num_table;
    }

    public function setNumTable(int $num_table): static
    {
        $this->num_table = $num_table;

        return $this;
    }

    public function getCapacite(): ?int
    {
        return $this->capacite;
    }

    public function setCapacite(int $capacite): static
    {
        $this->capacite = $capacite;

        return $this;
    }

    public function getEtatTable(): ?EtatTable
    {
        return $this->etat_table;
    }

    public function setEtatTable(?EtatTable $etat_table): static
    {
        $this->etat_table = $etat_table;

        return $this;
    }
}
