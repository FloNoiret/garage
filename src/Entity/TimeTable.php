<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity()]
#[ORM\Table(name: "timetable")]
class TimeTable
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: "time")]
    private $mondayAM;

    #[ORM\Column(type: "time")]
    private $mondayPM;

    #[ORM\Column(type: "time")]
    private $tuesdayAM;

    #[ORM\Column(type: "time")]
    private $tuesdayPM;

    #[ORM\Column(type: "time")]
    private $wednesdayAM;

    #[ORM\Column(type: "time")]
    private $wednesdayPM;

    #[ORM\Column(type: "time")]
    private $thursdayAM;

    #[ORM\Column(type: "time")]
    private $thursdayPM;

    #[ORM\Column(type: "time")]
    private $fridayAM;

    #[ORM\Column(type: "time")]
    private $fridayPM;

    #[ORM\Column(type: "time")]
    private $saturdayAM;

    #[ORM\Column(type: "time")]
    private $saturdayPM;

    #[ORM\Column(type: "time")]
    private $sundayAM;

    #[ORM\Column(type: "time")]
    private $sundayPM;


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of mondayAM
     */ 
    public function getMondayAM()
    {
        return $this->mondayAM;
    }

    /**
     * Set the value of mondayAM
     *
     * @return  self
     */ 
    public function setMondayAM($mondayAM)
    {
        $this->mondayAM = $mondayAM;

        return $this;
    }

    /**
     * Get the value of mondayPM
     */ 
    public function getMondayPM()
    {
        return $this->mondayPM;
    }

    /**
     * Set the value of mondayPM
     *
     * @return  self
     */ 
    public function setMondayPM($mondayPM)
    {
        $this->mondayPM = $mondayPM;

        return $this;
    }

    /**
     * Get the value of tuesdayAM
     */ 
    public function getTuesdayAM()
    {
        return $this->tuesdayAM;
    }

    /**
     * Set the value of tuesdayAM
     *
     * @return  self
     */ 
    public function setTuesdayAM($tuesdayAM)
    {
        $this->tuesdayAM = $tuesdayAM;

        return $this;
    }

    /**
     * Get the value of tuesdayPM
     */ 
    public function getTuesdayPM()
    {
        return $this->tuesdayPM;
    }

    /**
     * Set the value of tuesdayPM
     *
     * @return  self
     */ 
    public function setTuesdayPM($tuesdayPM)
    {
        $this->tuesdayPM = $tuesdayPM;

        return $this;
    }

    /**
     * Get the value of wednesdayAM
     */ 
    public function getWednesdayAM()
    {
        return $this->wednesdayAM;
    }

    /**
     * Set the value of wednesdayAM
     *
     * @return  self
     */ 
    public function setWednesdayAM($wednesdayAM)
    {
        $this->wednesdayAM = $wednesdayAM;

        return $this;
    }

    /**
     * Get the value of wednesdayPM
     */ 
    public function getWednesdayPM()
    {
        return $this->wednesdayPM;
    }

    /**
     * Set the value of wednesdayPM
     *
     * @return  self
     */ 
    public function setWednesdayPM($wednesdayPM)
    {
        $this->wednesdayPM = $wednesdayPM;

        return $this;
    }

    /**
     * Get the value of thursdayAM
     */ 
    public function getThursdayAM()
    {
        return $this->thursdayAM;
    }

    /**
     * Set the value of thursdayAM
     *
     * @return  self
     */ 
    public function setThursdayAM($thursdayAM)
    {
        $this->thursdayAM = $thursdayAM;

        return $this;
    }

    /**
     * Get the value of thursdayPM
     */ 
    public function getThursdayPM()
    {
        return $this->thursdayPM;
    }

    /**
     * Set the value of thursdayPM
     *
     * @return  self
     */ 
    public function setThursdayPM($thursdayPM)
    {
        $this->thursdayPM = $thursdayPM;

        return $this;
    }

    /**
     * Get the value of fridayAM
     */ 
    public function getFridayAM()
    {
        return $this->fridayAM;
    }

    /**
     * Set the value of fridayAM
     *
     * @return  self
     */ 
    public function setFridayAM($fridayAM)
    {
        $this->fridayAM = $fridayAM;

        return $this;
    }

    /**
     * Get the value of fridayPM
     */ 
    public function getFridayPM()
    {
        return $this->fridayPM;
    }

    /**
     * Set the value of fridayPM
     *
     * @return  self
     */ 
    public function setFridayPM($fridayPM)
    {
        $this->fridayPM = $fridayPM;

        return $this;
    }

    /**
     * Get the value of saturdayAM
     */ 
    public function getSaturdayAM()
    {
        return $this->saturdayAM;
    }

    /**
     * Set the value of saturdayAM
     *
     * @return  self
     */ 
    public function setSaturdayAM($saturdayAM)
    {
        $this->saturdayAM = $saturdayAM;

        return $this;
    }

    /**
     * Get the value of saturdayPM
     */ 
    public function getSaturdayPM()
    {
        return $this->saturdayPM;
    }

    /**
     * Set the value of saturdayPM
     *
     * @return  self
     */ 
    public function setSaturdayPM($saturdayPM)
    {
        $this->saturdayPM = $saturdayPM;

        return $this;
    }

    /**
     * Get the value of sundayAM
     */ 
    public function getSundayAM()
    {
        return $this->sundayAM;
    }

    /**
     * Set the value of sundayAM
     *
     * @return  self
     */ 
    public function setSundayAM($sundayAM)
    {
        $this->sundayAM = $sundayAM;

        return $this;
    }

    /**
     * Get the value of sundayPM
     */ 
    public function getSundayPM()
    {
        return $this->sundayPM;
    }

    /**
     * Set the value of sundayPM
     *
     * @return  self
     */ 
    public function setSundayPM($sundayPM)
    {
        $this->sundayPM = $sundayPM;

        return $this;
    }
}
