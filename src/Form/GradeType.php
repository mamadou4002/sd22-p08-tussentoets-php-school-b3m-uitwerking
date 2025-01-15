<?php

namespace App\Form;

use App\Entity\Grade;
use App\Entity\Student;
use App\Entity\Subject;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GradeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('grade', null, ['label' => 'Cijfer'])
            ->add('subject', EntityType::class, [
                'label' => 'Vak',
                'class' => Subject::class,
                'choice_label' => 'name',
            ])
            ->add('submit', SubmitType::class, ['label' => 'Opslaan', 'attr' => ['class' => 'btn btn-secondary']])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Grade::class,
        ]);
    }
}
