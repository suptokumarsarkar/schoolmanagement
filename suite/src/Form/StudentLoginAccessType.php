<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StudentLoginAccessType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add("Email", EmailType::class, [
                'label' => "Login Email",
            ])
            ->add("Password", PasswordType::class, [
                'label' => "Login Password",
            ])
            ->add("StudentId", HiddenType::class, [
                'data' => $options['data']['student']->getId(),
            ])
            ->add("redirectTo", HiddenType::class, [
                'data' => $options['data']['redirect'],
            ])
            ->add("Create", SubmitType::class, [
                'label' => "Create",
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
