<?php

namespace App\Form;

use App\Entity\CommentPost;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommentApprovalType extends AbstractType
{
    /* Creation of the approval form*/
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("approved", ChoiceType::class, ['choices' => [
                'Approuver ' => '1',
                'Retirer l\'Approbation' => '0',
            ], "label" => "Que souhaitez-vous faire ? ", "required" => true]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => CommentPost::class,
            'csrf_protection' => true,
            // the name of the hidden HTML field that stores the token
            'csrf_field_name' => '_token',
            // an arbitrary string used to generate the value of the token
            // using a different string for each form improves its security
            'csrf_token_id'   => 'commentapproval_item',
        ]);
    }
}
