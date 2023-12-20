<?php

namespace App\Form;

use App\Entity\Console;
use App\Entity\Editeur;
use App\Entity\Etat;
use App\Entity\Jeu;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class JeuFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', options:[
                'label' => 'Nom :'
            ])
            ->add('type')
                ->add('image', FileType::class, [
                'label' => 'Image (JPEG, PNG, GIF)',
                'required' => false, // le champ n'est pas obligatoire
                'mapped' => false,   // ce champ n'est pas mappé à l'entité directement
            ])
            ->add('annee_sortie')
            ->add('prix_revente')
            ->add('fk_editeur', EntityType::class, [
                'class' => Editeur::class,
'choice_label' => 'nom',
            ])
            ->add('fk_etat', EntityType::class, [
                'class' => Etat::class,
'choice_label' => 'libelle',
            ])
//             ->add('piloter', EntityType::class, [
//                 'class' => Console::class,
// 'choice_label' => 'id',
// 'multiple' => true,
//             ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Jeu::class,
        ]);
    }
}
