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
            ->add("mondayAM", TimeType::class, ['widget' => 'single_text', "label" => "Ouverture Lundi Matin", "required" => true])
            ->add("closemondayAM", TimeType::class, ['widget' => 'single_text', "label" => "Jusqu'à", "required" => true])
            ->add("mondayPM", TimeType::class, ['widget' => 'single_text', "label" => "Ouverture Lundi Après Midi", "required" => true])
            ->add("closemondayPM", TimeType::class, ['widget' => 'single_text', "label" => " Jusqu'à", "required" => true])
            ->add("tuesdayAM", TimeType::class, ['widget' => 'single_text', "label" => "Mardi Matin", "required" => true])
            ->add("closetuesdayAM", TimeType::class, ['widget' => 'single_text', "label" => "Jusqu'à", "required" => true])
            ->add("tuesdayPM", TimeType::class, ['widget' => 'single_text', "label" => "Mardi Après Midi", "required" => true])
            ->add("closetuesdayPM", TimeType::class, ['widget' => 'single_text', "label" => "Jusqu'à", "required" => true])
            ->add("wednesdayAM", TimeType::class, ['widget' => 'single_text', "label" => "Mercredi Matin", "required" => true])
            ->add("closewednesdayAM", TimeType::class, ['widget' => 'single_text', "label" => "Jusqu'à", "required" => true])
            ->add("wednesdayPM", TimeType::class, ['widget' => 'single_text', "label" => "Mercredi Après Midi", "required" => true])
            ->add("closewednesdayPM", TimeType::class, ['widget' => 'single_text', "label" => "Jusqu'à", "required" => true])
            ->add("thursdayAM", TimeType::class, ['widget' => 'single_text', "label" => "Jeudi Matin", "required" => true])
            ->add("closethursdayAM", TimeType::class, ['widget' => 'single_text', "label" => "Jusqu'à", "required" => true])
            ->add("thursdayPM", TimeType::class, ['widget' => 'single_text', "label" => "Jeudi Après Midi", "required" => true])
            ->add("closethursdayPM", TimeType::class, ['widget' => 'single_text', "label" => "Jusqu'à", "required" => true])
            ->add("fridayAM", TimeType::class, ['widget' => 'single_text', "label" => "Vendredi Matin", "required" => true])
            ->add("closefridayAM", TimeType::class, ['widget' => 'single_text', "label" => "Jusqu'à", "required" => true])
            ->add("fridayPM", TimeType::class, ['widget' => 'single_text', "label" => "Vendredi Après Midi", "required" => true])
            ->add("closefridayPM", TimeType::class, ['widget' => 'single_text', "label" => "Jusqu'à", "required" => true])
            ->add("saturdayAM", TimeType::class, ['widget' => 'single_text', "label" => "Samedi Matin", "required" => true])
            ->add("closesaturdayAM", TimeType::class, ['widget' => 'single_text', "label" => "Jusqu'à", "required" => true])
            ->add("saturdayPM", TimeType::class, ['widget' => 'single_text', "label" => "Samedi Après Midi", "required" => true])
            ->add("closesaturdayPM", TimeType::class, ['widget' => 'single_text', "label" => "Jusqu'à", "required" => true])
            ->add("sundayAM", TimeType::class, ['widget' => 'single_text', "label" => "Dimanche Matin", "required" => true])
            ->add("closesundayAM", TimeType::class, ['widget' => 'single_text', "label" => "Jusqu'à", "required" => true])
            ->add("sundayPM", TimeType::class, ['widget' => 'single_text', "label" => "Dimanche Après Midi", "required" => true])
            ->add("closesundayPM", TimeType::class, ['widget' => 'single_text', "label" => "Jusqu'à", "required" => true]);
    }

    /*Link entity with form*/
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            "data_class" => TimeTable::class,
        ]);
    }
}