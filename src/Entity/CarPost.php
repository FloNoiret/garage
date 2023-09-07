<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use App\Entity\Equipment;
use App\Entity\Picture;
use App\Entity\Characteristic;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity()]
#[ORM\Table(name: "car_publication")]
class CarPost
{

    /* Setting Form Variables */

    #[ORM\Id()]
    #[ORM\GeneratedValue(strategy: "AUTO")]
    #[ORM\Column(type: "integer")]
    private int $id;

    #[ORM\Column(type: "string", length: 60)]
    private ?string $title = NULL;

    #[ORM\Column(type: "text", length: 300)]
    private string $content;

    #[ORM\OneToOne(targetEntity: 'Image', cascade: ["persist", "remove"])]
    private $image = NULL;

    #[ORM\OneToMany(mappedBy: 'carPost', targetEntity:Picture::class, cascade: ['persist', 'remove'])]
    private $pictures;
    
    #[ORM\Column(type: "integer")]
    private int $price;

    #[ORM\Column(type: "integer")]
    private int $kilometer;

    #[ORM\Column(type: "integer", length: 4)]
    private $date;

    #[ORM\OneToMany(mappedBy: 'carpost', targetEntity: Equipment::class, cascade: ['persist', 'remove'])]
    private Collection $equipments;

    #[ORM\OneToMany(mappedBy: 'characteristics', targetEntity: Characteristic::class, cascade: ["persist", "remove"])]
    private Collection $characteristics;

    public function __construct()
    {
        $this->equipments = new ArrayCollection();
        $this->characteristics = new ArrayCollection();
        $this->pictures = new ArrayCollection();
    }


    /* private $user;*/

    /* Setting Function to Get & Set Variables */
    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->$id = $id;
        return $this;
    }


    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    public function getContent()
    {
        return $this->content;
    }


    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }


    public function getImage(): ?Image
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get the value of user
     
     * public function getUser()
     * {
     *    return $this->user;
     * }
     */
    /**
     * Set the value of user
     *
     * @return  self
    

     *public function setUser($user)
     * {
     *    $this->user = $user;
     *
     *    return $this;
     *  }
     */
    /**
     * Get the value of price
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of kilometer
     */
    public function getKilometer()
    {
        return $this->kilometer;
    }

    /**
     * Set the value of kilometer
     *
     * @return  self
     */
    public function setKilometer($kilometer)
    {
        $this->kilometer = $kilometer;

        return $this;
    }

    /**
     * Get the value of year
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of year
     *
     * @return  self
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return Collection<int, Equipment>
     */
    public function getEquipments(): Collection
    {
        return $this->equipments;
    }

    public function addEquipment(Equipment $equipment): static
    {
        if (!$this->equipments->contains($equipment)) {
            $this->equipments->add($equipment);
            $equipment->setCarpost($this);
        }

        return $this;
    }

    public function removeEquipment(Equipment $equipment): static
    {
        if ($this->equipments->removeElement($equipment)) {
            // set the owning side to null (unless already changed)
            if ($equipment->getCarpost() === $this) {
                $equipment->setCarpost(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Characteristic>
     */
    public function getCharacteristics(): Collection
    {
        return $this->characteristics;
    }

    public function addCharacteristic(Characteristic $characteristic): static
    {
        if (!$this->characteristics->contains($characteristic)) {
            $this->characteristics->add($characteristic);
            $characteristic->setCharacteristics($this);
        }

        return $this;
    }

    public function removeCharacteristic(Characteristic $characteristic): static
    {
        if ($this->characteristics->removeElement($characteristic)) {
            // set the owning side to null (unless already changed)
            if ($characteristic->getCharacteristics() === $this) {
                $characteristic->setCharacteristics(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Picture[]
     */
    public function getPictures(): Collection
    {
        return $this->pictures ?: new ArrayCollection();
    }


    public function addPicture(Picture $picture): self
    {
        if (!$this->pictures->contains($picture)) {
            $this->pictures[] = $picture;
            $picture->setCarPost($this); // This sets the CarPost on the Picture entity to establish the relationship
        }

        return $this;
    }

    public function removePicture(Picture $picture): self
    {
        if ($this->pictures->contains($picture)) {
            $this->pictures->removeElement($picture);
            // set the owning side to null (unless already changed)
            if ($picture->getCarPost() === $this) {
                $picture->setCarPost(null);
            }
        }

        return $this;
    }
}
