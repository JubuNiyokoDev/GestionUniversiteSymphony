<?php

namespace App\Form;

use App\Entity\Classe;
use App\Entity\Departements;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClasseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('niveau')
            ->add('departement', EntityType::class, [
                'class' => Departements::class,
                'choice_label' => 'coded', // Affiche `coded` pour les départements
                'label' => 'Département'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Classe::class,
        ]);
    }
}
