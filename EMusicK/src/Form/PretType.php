<?php

namespace App\Form;

use App\Entity\Pret;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class PretType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('dateDebut', DateType::class, array('input' => 'datetime',
                                                        'widget' => 'single_text', 
                                                        'required' => true,
                                                        'label' =>'date de début ',
                                                        'placeholder' => 'jj/mm/aaaa'))
                                                
            ->add('dateFin', DateType::class, array('input' => 'datetime',
                                                        'widget' => 'single_text',  
                                                        'required' => true,
                                                        'label' =>'date de fin ',
                                                        'placeholder' => 'jj/mm/aaaa'))
            ->add('instrument',EntityType::class, array('class' => 'App\Entity\Instrument','choice_label' => 'intitule '))
            
            ->add('Emprunter', SubmitType::class, array('label' => 'Nouvel emprunt'))
            ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Pret::class,
        ]);
    }
}
