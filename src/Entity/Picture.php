<?php

namespace App\Entity;

use App\Entity\CarPost;
use App\Repository\PicturesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PicturesRepository::class)]
class Picture
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "AUTO")]
    #[ORM\Column(type: 'integer')]
    private $id;

    private $fichier;

    #[ORM\Column(length: 255)]
    private ?string $title = null;
    
    /**
     * @ORM\OneToMany(targetEntity="Picture", mappedBy="carpost", cascade={"persist", "remove"})
     */
    private $pictures;

    #[ORM\ManyToOne(inversedBy: 'pictures')]
    #[ORM\JoinColumn(name: 'carpost_id', referencedColumnName: 'id')]
    private ?CarPost $carPost = null;

    public function getId(): ?int
    {
        return $this->id;
    }



    /**
     * Get the value of title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of fichier
     */
    public function getFichier()
    {
        return $this->fichier;
    }

    /**
     * Set the value of fichier
     *
     * @return  self
     */
    public function setFichier($fichier)
    {
        $this->fichier = $fichier;

        return $this;
    }


    public function getCarPost(): ?CarPost
    {
        return $this->carPost;
    }

    public function setCarPost(?CarPost $carPost): self
    {
        $this->carPost = $carPost;

        return $this;
    }

    /**
     * Get the value of pictures
     */ 
    public function getPictures()
    {
        return $this->pictures;
    }

    /**
     * Set the value of pictures
     *
     * @return  self
     */ 
    public function setPictures($pictures)
    {
        $this->pictures = $pictures;

        return $this;
    }
}
