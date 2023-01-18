<?php

namespace App\Form\Filter;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NameFilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('status', ChoiceType::class, [
                'required' => false,
                'choices' => [
                    'Open' => 'open',
                    'Closed' => 'closed',
                ],
                'expanded' => true,
                'multiple' => true,
            ])
            ->add('brand', ChoiceType::class, [
                'required' => false,
                'choices' => [
                    'Brand 1' => 'Suzuki',
                    'Brand 2' => 'Nissan',
                ],

            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'csrf_protection' => false,
        ]);
    }
}
