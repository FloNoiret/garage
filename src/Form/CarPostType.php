<?php

namespace App\Form;

use App\Entity\CarPost;
use App\Entity\Equipment;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class CarPostType extends AbstractType
{
    /* Creation of the form*/
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add("title", TextType::class, ["label" => "Titre", "required" => true])
            ->add("content", TextareaType::class, ["label" => "Contenu", "required" => true])
            ->add("price", NumberType::class, ["label" => "Prix", "required" => true])
            ->add("kilometer", NumberType::class, ["label" => "Kilométrage", "required" => true])
            ->add("date", NumberType::class, ["label" => "Année de Mise en Circulation", "required" => true,  'attr' => [ 'maxlength' => 4]])
            ->add("image", ImageType::class, ["label" => "Télécharger une image principale", "required" => true])
            ->add('picture', FileType::class, [
                'label' => 'Ajouter des images à la galerie',
                'multiple' => true,
                'mapped' => false,
                'required' => false,
            
            ])

            ->add("equipments", CollectionType::class, [
                'entry_type' => EquipmentType::class,
                'entry_options' => ['label' => 'Equipment'],
                'allow_add' => true,
                'by_reference' => false /*Prevent default reference as NULL to car id when add option*/
            ])
            ->add("characteristics", CollectionType::class, [
                'entry_type' => CharacteristicType::class,
                'entry_options' => ['label' => true],
                'allow_add' => true,
                'by_reference' => false /*Prevent default reference as NULL to car id when add option*/
            ]);      
    }

    /*Link entity with form*/
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            "data_class" => CarPost::class,
            'csrf_protection' => true,
            // the name of the hidden HTML field that stores the token
            'csrf_field_name' => '_token',
            // an arbitrary string used to generate the value of the token
            // using a different string for each form improves its security
            'csrf_token_id'   => 'car_item',
        ]);
    }
}
