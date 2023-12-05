<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;


class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add("fullName", TextType::class, array(
                'attr' => array(
                    'placeholder' => 'Nom',
                    'minlength' => 1, 
                    'maxlength' => 50, 
                ),
                'label' => false,
                "required" => true
            ))
            ->add("email", EmailType::class, array(
                'attr' => array(
                    'placeholder' => 'Email',
                    'maxlength' => 180,
                ),
                'label' => false,
                "required" => true
            ))
            ->add('number', TelType::class, [
                'attr' => [
                    'placeholder' => 'Téléphone',
                    'pattern' => '^0[1-9]\d{8}$', // Set the regex pattern directly
                    'title' => 'Le numéro de téléphone doit être au format français, par exemple : 0123456789',
             
                ],
                'label' => false,
                'required' => true,
            ])
            
            ->add("subject", TextType::class, array(
                'attr' => array(
                    'placeholder' => 'Sujet',
                    'minlength' => 1, 
                    'maxlength' => 100, 
                ),
                'label' => false,
                "required" => true
            ))
            ->add("message", TextareaType::class, array(
                'attr' => array(
                    'placeholder' => 'Message',
                    'minlength' => 1, 
                    'maxlength' => 300, 
                ),
                'label' => false,
                "required" => true
            ))
            -> add('processed', HiddenType::class, [
                'data' => '0', ]);
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
            'csrf_token_id'   => 'contact_item',
        ]);
    }
}