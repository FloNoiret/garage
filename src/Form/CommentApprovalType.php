<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;


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
}
