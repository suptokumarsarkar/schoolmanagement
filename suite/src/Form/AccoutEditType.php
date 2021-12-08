<?php

namespace App\Form;

use App\Repository\LoginInfoRepository;
use App\Service\TimeZone;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class AccoutEditType extends AbstractType
{
    private LoginInfoRepository $loginInfoRepository;
    private TimeZone $timeZone;
    private TokenStorageInterface $tokenStorage;

    function __construct(LoginInfoRepository $loginInfoRepository, TimeZone $timeZone, TokenStorageInterface $tokenStorage)
    {
        $this->loginInfoRepository = $loginInfoRepository;
        $this->timeZone = $timeZone;
        $this->tokenStorage = $tokenStorage;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add("Email", EmailType::class, [
                'label' => "Email",
                'data' => $this->tokenStorage->getToken()->getUser()->getEmail()
            ])
            ->add("Password", PasswordType::class, [
                'label' => "Password",
                'required' => false
            ])
            ->add("ProfilePicture", FileType::class, [
                'label' => "Profile Picture",
                'required' => false
            ])
            ->add("Timezone", ChoiceType::class, [
                'choices' => $this->timeZone->getTimezoneList(),
                'label' => "Timezone",
                'data' => $this->loginInfoRepository->LogInfo($this->tokenStorage->getToken()->getUser())->getTimezone()
            ])
            ->add("Change", SubmitType::class, [
                'label' => "Change"
            ]);;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
