<?php
namespace App\Util;

class Coat
{
    private string $description;

    private float $price;

    public function isForWinter(): bool
    {
        if($this->description == 'hooded'){
            return true;
        }

        if($this->description == 'waterproof'){
            return true;
        }

        return false;
    }
    public function isForWinterString(): string
    {
        if($this->isForWinter()){
            return 'Suitable for winter';
        }

        return 'More of a summer coat';
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }
}
