<?php

namespace App\Twig;

use App\Entity\CommentPost;

use Doctrine\ORM\EntityManagerInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class CommentExtension extends AbstractExtension
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('comment', [$this, 'getComment'])
        ];
    }

    public function getComment()
    {
        return $this->em->getRepository(CommentPost::class)->findAll();
    }
}
