<?php

namespace App\Entity;

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

    #[ORM\Column(type: "string")]
    private $image = NULL;

   #[ORM\Column(type: "integer")]
    private int $price;

     #[ORM\Column(type: "integer")] 
    private int $kilometer; 

    #[ORM\Column(type: "datetime")]
    private $year; 

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


    public function getImage()
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
}
