<?php

namespace App\Entity;

use App\Repository\EquipmentRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: EquipmentRepository::class)]
class Equipment
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "AUTO")]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: "string", length: 40)]
    #[Assert\NotBlank(message: "Le libellé ne doit pas être vide")]
    #[Assert\Length(min: 1, max: 40, minMessage: "Le libellé doit avoir au moins 1 caractère", maxMessage: "Le libellé ne doit pas faire plus de 40 caractères")]
    private ?string $libelle = null;

    #[ORM\ManyToOne(inversedBy: 'equipments')]
    private ?CarPost $carpost = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getCarpost(): ?CarPost
    {
        return $this->carpost;
    }

    public function setCarpost(?CarPost $carpost): static
    {
        $this->carpost = $carpost;

        return $this;
    }
}
