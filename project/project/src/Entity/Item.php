<?php

namespace App\Entity;

use App\Repository\ItemRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ItemRepository::class)]
class Item
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Material = null;

    #[ORM\Column(length: 255)]
    private ?string $Colour = null;

    #[ORM\Column]
    private ?bool $Damaged = null;

    #[ORM\Column(length: 255)]
    private ?string $typeOfClothing = null;

    #[ORM\Column]
    private ?int $price = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMaterial(): ?string
    {
        return $this->Material;
    }

    public function setMaterial(string $Material): static
    {
        $this->Material = $Material;

        return $this;
    }

    public function getColour(): ?string
    {
        return $this->Colour;
    }

    public function setColour(string $Colour): static
    {
        $this->Colour = $Colour;

        return $this;
    }

    public function isDamaged(): ?bool
    {
        return $this->Damaged;
    }

    public function setDamaged(bool $Damaged): static
    {
        $this->Damaged = $Damaged;

        return $this;
    }

    public function getTypeOfClothing(): ?string
    {
        return $this->typeOfClothing;
    }

    public function setTypeOfClothing(string $typeOfClothing): static
    {
        $this->typeOfClothing = $typeOfClothing;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): static
    {
        $this->price = $price;

        return $this;
    }
}
