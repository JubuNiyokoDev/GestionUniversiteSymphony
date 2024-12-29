<?php

namespace App\Form;

use App\Entity\Classe;
use App\Entity\Etudiants;
use App\Entity\Inscriptions;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InscriptionsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('anneacademique')
            ->add('classe', EntityType::class, [
                'class' => Classe::class,
                'choice_label' => function (Classe $classe) {
                    // Retourne le niveau, département, et faculté de la classe
                    $niveau = $classe->getNiveau();
                    $departement = $classe->getDepartement()->getNomd();
                    $faculte = $classe->getDepartement()->getFaculite()->getCodef();
                    return sprintf('%s (%s de %s)', $niveau, $departement, $faculte);
                },
                'label' => 'Classe'
            ])
            ->add('etudiant', EntityType::class, [
                'class' => Etudiants::class,
                'choice_label' => function (Etudiants $etudiant) {
                    // Affiche le nom et prénom pour les étudiants
                    return $etudiant->getNom() . ' ' . $etudiant->getPrenom();
                },
                'label' => 'Étudiant'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Inscriptions::class,
        ]);
    }
}
