<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

class JokeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('content', null, array(
                'label' => false,
                'attr' => array(
                    'class' => 'form-control',
                )
            ))
            ->add('save', SubmitType::class, array(
                'attr' => array(
                    'class' => 'btn btn-primary mt-2'
                )
            ))
        ;
    }
}