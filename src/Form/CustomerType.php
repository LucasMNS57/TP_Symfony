<?php

namespace App\Form;

use App\Entity\Customer;
use App\Entity\Company;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CustomerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
         $builder
            ->add('lastname')
            ->add('firstname')
            ->add('email')
            ->add('position')
            ->add('company', EntityType::class, [
                'class' => 'App\Entity\Company', // Utilisez l'entité Company au lieu de Customer
                'choice_label' => 'name', // Utilisez le champ 'name' ou tout autre champ approprié de l'entité Company
                'placeholder' => 'Sélectionnez une entreprise', // Ajoutez une option pour un champ vide
                'required' => false, // Rendez le champ facultatif
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Customer::class,
        ]);
    }
}
