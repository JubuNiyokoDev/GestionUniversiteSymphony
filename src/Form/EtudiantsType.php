<?php

namespace App\Form;


use App\Entity\Etudiants;
use App\Entity\Classe;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class EtudiantsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('ddn', DateType::class, [
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd',
            ])
            ->add('gerne', ChoiceType::class, [
                'choices' => [
                    'Male' => 'male',
                    'Female' => 'female',
                    'Other' => 'other',
                ],
                'placeholder' => 'Choose gender',
                'expanded' => false,
                'multiple' => false,
                'attr' => ['class' => 'form-select'],
            ])
            ->add('noteexeta')
            ->add('classe', EntityType::class, [
                'class' => Classe::class,
                'choice_label' => function (Classe $classe) {
                    $niveau = $classe->getNiveau();
                    $departement = $classe->getDepartement()->getNomd();
                    $faculte = $classe->getDepartement()->getFaculite()->getCodef();
                    return sprintf('%s (%s de %s)', $niveau, $departement, $faculte);
                },
                'label' => 'Classe',
                'attr' => ['class' => 'form-select'],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Etudiants::class,
        ]);
    }
}
