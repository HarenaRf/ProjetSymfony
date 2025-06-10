<?php

namespace App\Form;

use App\Entity\TableResto;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EnumType;
use App\Enum\EtatTable;

class TableRestoForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('num_table')
            ->add('capacite')
            ->add('etat_table', EnumType::class, [
                'class'=>EtatTable::class,
                'label'=>'Etat',
                'choice_label'=>fn(EtatTable $choice) => ucfirst($choice->value),])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => TableResto::class,
        ]);
    }
}
