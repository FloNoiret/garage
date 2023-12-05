<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity()]
#[ORM\Table(name: "contact")]
class Contact
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "AUTO")]
    #[ORM\Column(type: 'integer')]
    private ?int $id;

    #[ORM\Column(type: 'string', length: 50)]
    #[Assert\NotBlank()]
    #[Assert\Length(min: 1, max: 50)]
    private ?string $fullName = null;

    #[ORM\Column(type: 'string', length: 180)]
    #[Assert\NotBlank()]
    #[Assert\Email()]
    private string $email;

    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    #[Assert\NotBlank()]
    #[Assert\Length(min: 1, max: 100)]
    private ?string $subject = null;


    #[ORM\Column(type: 'text')]
    #[Assert\NotBlank()]
    #[Assert\Length(min: 1, max: 300)]
    private string $message;

    #[ORM\Column(type: "string")]
    #[Assert\NotBlank()]
    #[Assert\Regex(
        pattern: "/^0[1-9]\d{8}$/",
    )]
    private string $number;

    #[ORM\Column(type: "boolean", length: 60)]
    private $processed = false;


    #[ORM\Column(type: 'datetime_immutable')]
    private ?\DateTimeImmutable $createdAt;

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFullName(): ?string
    {
        return $this->fullName;
    }

    public function setFullName(?string $fullName): self
    {
        $this->fullName = $fullName;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getSubject(): ?string
    {
        return $this->subject;
    }

    public function setSubject(?string $subject): self
    {
        $this->subject = $subject;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get the value of number
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set the value of number
     *
     * @return  self
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get the value of processed
     */ 
    public function getProcessed()
    {
        return $this->processed;
    }

    /**
     * Set the value of processed
     *
     * @return  self
     */ 
    public function setProcessed($processed)
    {
        $this->processed = $processed;

        return $this;
    }
}
