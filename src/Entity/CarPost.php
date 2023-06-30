<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use App\Entity\Reponse;
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

    #[ORM\OneToOne(targetEntity: 'Image', cascade:["persist", "remove"])]
    private $image = NULL;

   #[ORM\Column(type: "integer")]
    private int $price;

     #[ORM\Column(type: "integer")] 
    private int $kilometer; 

    #[ORM\Column(type: "datetime")]
    private $year;

    #[ORM\OneToMany(mappedBy: 'carpost', targetEntity: Reponse::class, cascade:['persist', 'remove'])]
    private Collection $reponses;

    public function __construct()
    {
        $this->reponses = new ArrayCollection();
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


    public function getImage():?Image
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
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set the value of year
     *
     * @return  self
     */ 
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * @return Collection<int, Reponse>
     */
    public function getReponses(): Collection
    {
        return $this->reponses;
    }

    public function addReponse(Reponse $reponse): static
    {
        if (!$this->reponses->contains($reponse)) {
            $this->reponses->add($reponse);
            $reponse->setCarpost($this);
        }

        return $this;
    }

    public function removeReponse(Reponse $reponse): static
    {
        if ($this->reponses->removeElement($reponse)) {
            // set the owning side to null (unless already changed)
            if ($reponse->getCarpost() === $this) {
                $reponse->setCarpost(null);
            }
        }

        return $this;
    }

}