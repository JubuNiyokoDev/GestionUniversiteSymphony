<?php

namespace App\Form;

use App\Entity\Departements;
use App\Entity\Faculites;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DepartementsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomd')
            ->add('coded')
            ->add('faculite', EntityType::class, [
                'class' => Faculites::class,
                'choice_label' => 'codef', // Affiche `codef` pour les facultés
                'label' => 'Faculté'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Departements::class,
        ]);
    }
}
