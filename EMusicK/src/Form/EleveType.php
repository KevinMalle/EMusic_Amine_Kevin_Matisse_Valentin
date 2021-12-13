<?php

namespace App\Form;

use App\Entity\Eleve;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;


class EleveType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('dateNaiss', DateType::class, array('input' => 'datetime',
            'widget' => 'single_text', 
            'required' => true,
            'label' =>'date de début ',
            'placeholder' => 'jj/mm/aaaa'))
            ->add('rue')
            ->add('ville')
            ->add('codePostal')
            ->add('compte',EntityType::class, array('class' => 'App\Entity\Compte','choice_label' => 'identifiant '))
            ->add('responsable',EntityType::class, array('class' => 'App\Entity\Responsable','choice_label' => 'nom '))
            ->add('enregistrer', SubmitType::class, array('label' => 'Nouvel eleve'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Eleve::class,
        ]);
    }
}
