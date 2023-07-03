<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;


class ContactProcessedType extends AbstractType
{
    /* Creation of the approval form*/
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("processed", ChoiceType::class, ['choices' => [
                'Demande traitée ' => '1',
                'Demande non traitée' => '0',
            ], "label" => "Avez-vous réponsu à la demande de contact ? ", "required" => true]);
    }
}
