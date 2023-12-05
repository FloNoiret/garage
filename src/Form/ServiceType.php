<?php

namespace App\Form;

use App\Entity\Service;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;


class ServiceType extends AbstractType
{
    /* Creation of the form*/
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("title", TextType::class, ["label" => "Titre du Service", "required" => true,  "constraints" => [
                new Length(["min" => 1, "max" => 60, "minMessage" => "Le titre ne peux pas être inférieur à 1 caratères", "maxMessage" => "Le titre ne peux pas être supérieur à 60 caratères"]),
                new NotBlank(["message" => "Le titre ne peut pas être vide"])
            ]],)

            ->add("content", TextareaType::class, ["label" => "Description dui service", "required" => true, "constraints" => [
                new Length(["min" => 1, "max" => 300, "minMessage" => "La description ne peux pas être inférieure à 1 caratères", "maxMessage" => "La description ne peux pas être supérieure à 60 caratères"]),
                new NotBlank(["message" => "La description ne peut pas être vide"])
            ]]);
    }

    /*Link entity with form*/
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            "data_class" => Service::class,
            'csrf_protection' => true,
            // the name of the hidden HTML field that stores the token
            'csrf_field_name' => '_token',
            // an arbitrary string used to generate the value of the token
            // using a different string for each form improves its security
            'csrf_token_id'   => 'service_item',
        ]);
    }
}
