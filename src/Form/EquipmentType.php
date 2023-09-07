<?php

namespace App\Form;


use App\Entity\Equipment;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class EquipmentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('libelle', TextType::class, [
                'label' => false,
                "constraints" => [
                    new Length(["min" => 1, "max" => 40, "minMessage" => "Le nom de l\'équipement ne peux pas être inférieur à 1 caratères", "maxMessage" => "Le nom de l\'équipement ne peux pas être supérieur à 40 caratères"]),
                    new NotBlank(["message" => "Le nom de l\'équipement ne peut pas être vide"])
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Equipment::class,
            'csrf_protection' => true,
            // the name of the hidden HTML field that stores the token
            'csrf_field_name' => '_token',
            // an arbitrary string used to generate the value of the token
            // using a different string for each form improves its security
            'csrf_token_id'   => 'equipment_item',
        ]);
    }
}
