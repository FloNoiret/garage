<?php

namespace App\Twig;

use App\Entity\TimeTable;
use Doctrine\ORM\EntityManagerInterface;
use Twig\Extension\AbstractExtension;
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
