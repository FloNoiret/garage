<?php

namespace App\Form;

use App\Entity\CommentPost;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
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
            ->add("grade", ChoiceType::class, ['choices' => [
                '5/5 (Satisfait) ' => '5',
                '4/5 (Bien)' => '4',
                '3/5 (Moyen)' => '3',
                '2/5 (Peu satisfait)' => '2',
                '1/5 (Pas du tout satisfait)' => '1',
            ], "label" => "Qu'avez-vous pensez de nos services ? ", "required" => true])
            -> add("title", TextType::class, ["label" => "Titre", "required" => true])
            -> add("content", TextareaType::class, ["label" => "Ajouter un commentaire", "required" => true])
            -> add('approved', HiddenType::class, [
                'data' => '0', ]);
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


class CommentApprovalType extends AbstractType
{
    /* Creation of the form*/
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("approved", ChoiceType::class, ['choices' => [
                'Approuver ' => '1',
                'Retirer l\'Approbation' => '0',
            ], "label" => "Que souhaitez-vous faire ? ", "required" => true]);
    }
}