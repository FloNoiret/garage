<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

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
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
            'csrf_protection' => true,
            // the name of the hidden HTML field that stores the token
            'csrf_field_name' => '_token',
            // an arbitrary string used to generate the value of the token
            // using a different string for each form improves its security
            'csrf_token_id'   => 'contactprocessed_item',
        ]);
    }
}
