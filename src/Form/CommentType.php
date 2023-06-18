<?php

namespace App\Form;

use App\Entity\CommentPost;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\RangeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class CommentType extends AbstractType
{
    /* Creation of the form*/
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("author", TextType::class, ["label" => "Votre Nom", "required" => true])
            ->add("grade", RangeType::class, [ 'attr' => [
                'min' => 1,
                'max' => 5
            ],"label" => "Note", "required" => true])
            ->add("title", TextType::class, ["label" => "Titre", "required" => true])
            ->add("content", TextareaType::class, ["label" => "Contenu", "required" => true]);
    }

    /*Link entity with form*/
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            "data_class" => CommentPost::class,
            'csrf_protection' => true,
            // the name of the hidden HTML field that stores the token
            'csrf_field_name' => '_token',
            // an arbitrary string used to generate the value of the token
            // using a different string for each form improves its security
            'csrf_token_id'   => 'comment_item',
        ]);
    }
}
