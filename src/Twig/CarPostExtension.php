<?php

namespace App\Twig;

use App\Entity\CarPost;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Twig\Extension\AbstractExtension;
use Symfony\Bundle\TwigBundle\DependencyInjection\TwigExtension;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\TwigFunction;

class CarPostExtension extends AbstractExtension
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('carpost', [$this, 'getCarpost'])
        ];
    }

    public function getCarpost()
    {
        return $this->em->getRepository(CarPost::class)->findAll();
    }
}
