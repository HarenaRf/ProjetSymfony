<?php

namespace App\Form;

use App\Entity\Commande;
use App\Entity\TableResto;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommandeForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date_cmd', null, [
                'widget' => 'single_text',
            ])
            ->add('total')
            ->add('id_table', EntityType::class, [
                'class' => TableResto::class,
                'choice_label' => 'num_table',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Commande::class,
        ]);
    }
}
