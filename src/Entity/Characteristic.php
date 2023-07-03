<?php

namespace App\Entity;

use App\Repository\CharacteristicRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CharacteristicRepository::class)]
class Characteristic
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $libelle = null;

    #[ORM\Column(length: 255)]
    private ?string $info = null;

    #[ORM\ManyToOne(inversedBy: 'characteristics')]
    private ?CarPost $characteristics = null;

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getInfo(): ?string
    {
        return $this->info;
    }

    public function setInfo(string $info): static
    {
        $this->info = $info;

        return $this;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): static
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getCharacteristics(): ?CarPost
    {
        return $this->characteristics;
    }

    public function setCharacteristics(?CarPost $characteristics): static
    {
        $this->characteristics = $characteristics;

        return $this;
    }
}
