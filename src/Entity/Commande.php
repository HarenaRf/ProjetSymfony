<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommandeRepository::class)]
class Commande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    private ?TableResto $id_table = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $date_cmd = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 0)]
    private ?string $total = null;

    /**
     * @var Collection<int, CommandDetail>
     */
    #[ORM\OneToMany(targetEntity: CommandDetail::class, mappedBy: 'id_cmd')]
    private Collection $commandDetails;

    public function __construct()
    {
        $this->commandDetails = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdTable(): ?TableResto
    {
        return $this->id_table;
    }

    public function setIdTable(?TableResto $id_table): static
    {
        $this->id_table = $id_table;

        return $this;
    }

    public function getDateCmd(): ?\DateTimeImmutable
    {
        return $this->date_cmd;
    }

    public function setDateCmd(\DateTimeImmutable $date_cmd): static
    {
        $this->date_cmd = $date_cmd;

        return $this;
    }

    public function getTotal(): ?string
    {
        return $this->total;
    }

    public function setTotal(string $total): static
    {
        $this->total = $total;

        return $this;
    }

    /**
     * @return Collection<int, CommandDetail>
     */
    public function getCommandDetails(): Collection
    {
        return $this->commandDetails;
    }

    public function addCommandDetail(CommandDetail $commandDetail): static
    {
        if (!$this->commandDetails->contains($commandDetail)) {
            $this->commandDetails->add($commandDetail);
            $commandDetail->setIdCmd($this);
        }

        return $this;
    }

    public function removeCommandDetail(CommandDetail $commandDetail): static
    {
        if ($this->commandDetails->removeElement($commandDetail)) {
            // set the owning side to null (unless already changed)
            if ($commandDetail->getIdCmd() === $this) {
                $commandDetail->setIdCmd(null);
            }
        }

        return $this;
    }
}
