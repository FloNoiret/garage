<?php

namespace App\Form;

use App\Entity\TimeTable;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class TimeTableType extends AbstractType
{
    /* Creation of the form*/
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("mondayAM", TimeType::class, ["label" => "Lundi Matin", "required" => true])
            ->add("mondayPM", TimeType::class, ["label" => "Lundi Après Midi", "required" => true])
            ->add("tuesdayAM", TimeType::class, ["label" => "Mardi Matin", "required" => true])
            ->add("tuesdayPM", TimeType::class, ["label" => "Mardi Après Midi", "required" => true])
            ->add("wednesdayAM", TimeType::class, ["label" => "Mercredi Matin", "required" => true])
            ->add("wednesdayPM", TimeType::class, ["label" => "Mercredi Après Midi", "required" => true])
            ->add("thursdayAM", TimeType::class, ["label" => "Jeudi Matin", "required" => true])
            ->add("thursdayPM", TimeType::class, ["label" => "Jeudi Après Midi", "required" => true])
            ->add("fridayAM", TimeType::class, ["label" => "Vendredi Matin", "required" => true])
            ->add("fridayPM", TimeType::class, ["label" => "Vendredi Après Midi", "required" => true])
            ->add("saturdayAM", TimeType::class, ["label" => "Samedi Matin", "required" => true])
            ->add("saturdayPM", TimeType::class, ["label" => "Samedi Après Midi", "required" => true])
            ->add("sundayAM", TimeType::class, ["label" => "Dimanche Matin", "required" => true])
            ->add("sundayPM", TimeType::class, ["label" => "Dimanche Après Midi", "required" => true]);
    }

    /*Link entity with form*/
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            "data_class" => TimeTable::class,
        ]);
    }
}