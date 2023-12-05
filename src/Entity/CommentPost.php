<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity()]
#[ORM\Table(name: "comment")]

class CommentPost
{

    /* Setting Form Variables */

    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "AUTO")]
    #[ORM\Column(type: "integer")]
    private int $id;

    #[ORM\Column(type: "string", length: 60)]
    #[Assert\NotBlank(message: "Le titre ne doit pas être vide")]
    #[Assert\Length(min: 1, max: 60, minMessage: "Le titre doit avoir au moins 1 caractère", maxMessage: "Le titre ne doit pas faire plus de 60 caractères")]
   
    private ?string $title = NULL;

    #[ORM\Column(type: "text", length: 300)]
    #[Assert\NotBlank(message: "Le message ne doit pas être vide")]
    #[Assert\Length(min: 1, max: 300, minMessage: "Le message doit avoir au moins 1 caractère", maxMessage: "Le message ne doit pas faire plus de 300 caractères")]
    private string $content;

    #[ORM\Column(type: "string", length: 60)]
    #[Assert\NotBlank(message: "Le nom d'auteur ne doit pas être vide")]
    #[Assert\Length(min: 1, max: 20, minMessage: "Le nom de l'auteur doit avoir au moins 1 caractère", maxMessage: "Le nom de l'auteur ne doit pas faire plus de 20 caractères")]
    private ?string $author;

    #[ORM\Column(type: "integer")]
    #[Assert\NotBlank(message: "La note ne doit pas être vide")]
    private int $grade;

    #[ORM\Column(type: "boolean", length: 60)]
    private $approved = false;


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
     * Get the value of content
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set the value of content
     *
     * @return  self
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get the value of grade
     */
    public function getGrade()
    {
        return $this->grade;
    }

    /**
     * Set the value of grade
     *
     * @return  self
     */
    public function setGrade($grade)
    {
        $this->grade = $grade;

        return $this;
    }

    /**
     * Get the value of author
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set the value of author
     *
     * @return  self
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get the value of approved
     */
    public function getApproved()
    {
        return $this->approved;
    }

    /**
     * Set the value of approved
     *
     * @return  self
     */
    public function setApproved($approved)
    {
        $this->approved = $approved;

        return $this;
    }
}
