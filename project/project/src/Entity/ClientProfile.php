<?php

namespace App\Entity;

use App\Repository\ClientProfileRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClientProfileRepository::class)]
class ClientProfile
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $age = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column]
    private ?int $Dob = null;

    #[ORM\Column(length: 255)]
    private ?string $HistoryOfPurchase = null;

    #[ORM\Column]
    private ?bool $RentalStatus = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): static
    {
        $this->age = $age;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getDob(): ?int
    {
        return $this->Dob;
    }

    public function setDob(int $Dob): static
    {
        $this->Dob = $Dob;

        return $this;
    }

    public function getHistoryOfPurchase(): ?string
    {
        return $this->HistoryOfPurchase;
    }

    public function setHistoryOfPurchase(string $HistoryOfPurchase): static
    {
        $this->HistoryOfPurchase = $HistoryOfPurchase;

        return $this;
    }

    public function isRentalStatus(): ?bool
    {
        return $this->RentalStatus;
    }

    public function setRentalStatus(bool $RentalStatus): static
    {
        $this->RentalStatus = $RentalStatus;

        return $this;
    }
}
