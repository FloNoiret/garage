<?php

namespace App\Twig;

use App\Entity\TimeTable;
use App\Form\TimeTableType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Twig\Extension\AbstractExtension;
use Symfony\Bundle\TwigBundle\DependencyInjection\TwigExtension;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\TwigFunction;

class TimeTableExtension extends AbstractExtension
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('timetable', [$this, 'getTime'])
        ];
    }

    public function getTime()
    {
        return $this->em->getRepository(TimeTable::class)->findAll();
    }
}
