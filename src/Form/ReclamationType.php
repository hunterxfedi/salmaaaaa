<?php

namespace App\Form;

use App\Entity\Reclamation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\DateTime;

class ReclamationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('message', null, [
                'constraints' => [
                    new NotBlank(),
                    new Length(['max' => 255]),
                ],
            ])
            ->add('type', null, [
                'constraints' => [
                    new NotBlank(),
                    new Choice(['choices' => ['Complaint', 'Feedback', 'Inquiry']]),
                ],
            ])
            ->add('statut', null, [
                'constraints' => [
                    new NotBlank(),
                    new Choice(['choices' => ['New', 'In Progress', 'Closed']]),
                ],
            ])
            ->add('dateRec')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reclamation::class,
        ]);
    }
}
