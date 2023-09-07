<?php

namespace App\Form;

use App\Entity\Characteristic;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class CharacteristicType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('libelle', TextType::class, ['label' => 'Titre',
            "constraints" => [
                new Length(["min" => 1, "max" => 20, "minMessage" => "Le titre de la caractéristique ne peux pas être inférieur à 1 caratères", "maxMessage" => "Le titre ne peux pas être supérieur à 20 caratères"]),
                new NotBlank(["message" => "Le titre de la caractéristique ne peut pas être vide"])
            ]])
            ->add('info', TextType::class, ['label' => 'Détails',
            "constraints" => [
                new Length(["min" => 1, "max" => 20, "minMessage" => "Le détails de la caractéristique ne peux pas être inférieur à 1 caratères", "maxMessage" => "Le détails de la caractéristique ne peux pas être supérieur à 20 caratères"]),
                new NotBlank(["message" => "Le détails d'une caractéristique ne peut pas être vide"])
            ]]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Characteristic::class,
            'csrf_protection' => true,
            // the name of the hidden HTML field that stores the token
            'csrf_field_name' => '_token',
            // an arbitrary string used to generate the value of the token
            // using a different string for each form improves its security
            'csrf_token_id'   => 'characteristics_item',
        ]);
    }
}
