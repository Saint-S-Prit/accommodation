<?php

namespace App\Form;

use App\Entity\Room;
use App\Entity\Student;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Student1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName',TextType::class,['required' => false])
            ->add('lastName',TextType::class,['required' => false])
            ->add('birthday',TextType::class,['required' => false])
            ->add('email',TextType::class,['required' => false])
            ->add('phone',TelType::class,['required' => false])
            ->add('adresse',TextType::class,['required' => false])
            ->add('sholarship', ChoiceType::class, [
                'choices' => [
                    'pension' => "pension",
                    'partial scholarship' => "partial scholarship",
                ],
                'placeholder' => 'sholarship choix',
                'required'   => false,
            ])

            ->add('housing', ChoiceType::class, [
                'choices' => [
                    'single' => "single",
                    'many' => "many",
                ],
                'placeholder' => 'housing choix',
                'required'   => false,
            ])
            ->add('room', EntityType::class, [
                'class' => Room::class,
                'choice_label' => 'nameRoom',
                'label'=>false,
                'required'   => false,
                'placeholder' => 'room choix',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Student::class,
        ]);
    }
}
