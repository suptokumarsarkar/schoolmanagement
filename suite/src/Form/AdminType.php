<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class AdminType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add("Email", EmailType::class, [
                'label' => "Email"
            ])
            ->add("Password", PasswordType::class, [
                'label' => "Password"
            ])
            ->add("Secret", TextType::class, [
                'label' => "Admin Secret"
            ])
            ->add("Register", SubmitType::class, [
                'label' => "Register"
            ])
        ;
    }

}
