<?php

namespace App\Entity;

use App\Repository\CharacteristicRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity(repositoryClass: CharacteristicRepository::class)]
class Characteristic
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "AUTO")]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: "string", length: 20)]
    #[Assert\NotBlank(message: "Le libellé ne doit pas être vide")]
    #[Assert\Length(min: 1, max: 20, minMessage: "Le libellé doit avoir au moins 1 caractère", maxMessage: "Le libellé ne doit pas faire plus de 20 caractères")]
    private ?string $libelle = null;

    #[ORM\Column(type: "text", length: 20)]
    #[Assert\NotBlank(message: "La description ne doit pas être vide")]
    #[Assert\Length(min: 1, max: 20, minMessage: "La description doit avoir au moins 1 caractère", maxMessage: "La description ne doit pas faire plus de 20 caractères")]
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
