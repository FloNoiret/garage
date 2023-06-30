<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
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
                ),
                'label' => false,
                "required" => true
            ))
            ->add("email", EmailType::class, array(
                'attr' => array(
                    'placeholder' => 'Email',
                ),
                'label' => false,
                "required" => true
            ))
            ->add('number', TelType::class, array(
                'attr' => array(
                    'placeholder' => 'Téléphone',
                ),
                'label' => false,
                "required" => true
            ))
            ->add("subject", TextType::class, array(
                'attr' => array(
                    'placeholder' => 'Sujet',
                ),
                'label' => false,
                "required" => true
            ))
            ->add("message", TextareaType::class, array(
                'attr' => array(
                    'placeholder' => 'Message',
                ),
                'label' => false,
                "required" => true
            ));
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
            'csrf_token_id'   => 'comment_item',
        ]);
    }
}
