<?php

namespace App\Form;

use App\Entity\CarPost;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CarPostType extends AbstractType
{
    /* Creation of the form*/ 
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("image", UrlType::class, ["label" => "URL de l'image", "required" => true])
            ->add("title", TextType::class, ["label" => "Titre", "required" => true])
            ->add("content", TextareaType::class, ["label" => "Contenu", "required" => true])
            ->add("price", NumberType::class, ["label" => "Prix", "required" => true])
            ->add("kilometer", NumberType::class, ["label" => "Kilométrage", "required" => true])
            ->add("Year", NumberType::class, ["label" => "Année de Mise en Circulation", "required" => true]);
    }

     /*Link entity with form*/ 
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            "data_class" => CarPost::class
        ]);
    }
}
