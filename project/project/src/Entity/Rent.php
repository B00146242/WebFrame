<?php

namespace App\Entity;

use App\Repository\RentRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RentRepository::class)]
class Rent
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Item = null;

    #[ORM\Column]
    private ?int $Duration = null;

    #[ORM\Column]
    private ?int $Price = null;

    #[ORM\Column(length: 255)]
    private ?string $user = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getItem(): ?string
    {
        return $this->Item;
    }

    public function setItem(string $Item): static
    {
        $this->Item = $Item;

        return $this;
    }

    public function getDuration(): ?int
    {
        return $this->Duration;
    }

    public function setDuration(int $Duration): static
    {
        $this->Duration = $Duration;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->Price;
    }

    public function setPrice(int $Price): static
    {
        $this->Price = $Price;

        return $this;
    }

    public function getUser(): ?string
    {
        return $this->user;
    }

    public function setUser(string $user): static
    {
        $this->user = $user;

        return $this;
    }
}
