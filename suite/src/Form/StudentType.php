<?php

namespace App\Form;

use App\Service\DataService;
use App\Service\TimeZone;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StudentType extends AbstractType
{
    private DataService $DataService;
    private TimeZone $timeZone;
    function __construct(DataService $dataService, TimeZone $timeZone)
    {
        $this->DataService = $dataService;
        $this->timeZone = $timeZone;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add("GuardianName", TextType::class, [
                'label' => "Guardian Name"
            ])
            ->add("Email", EmailType::class, [
                'label' => "Email"
            ])
            ->add("Password", PasswordType::class, [
                'label' => "Password"
            ])
            ->add("Whatsapp", TextType::class, [
                'label' => "Whatsapp"
            ])
            ->add("Telegram", TextType::class, [
                'label' => "Telegram"
            ])
            ->add("AddressCity", TextType::class, [
                'label' => "City"
            ])
            ->add("AddressState", TextType::class, [
                'label' => "State"
            ])
            ->add("Country", ChoiceType::class, [
                'choices'  => $this->DataService->getCountries(),
                'label' => "Country"
            ])
            ->add("ProfilePicture", FileType::class, [
                'label' => "Profile Picture"
            ])
            ->add("Timezone", ChoiceType::class, [
                'choices'  => $this->timeZone->getTimezoneList(),
                'label' => "Timezone"
            ])

            /*
             * Second Page
             * This Data will Come After Clicking The next Button
             */
            ->add("StudentNumber", NumberType::class, [
                'label' => "Student Number",

            ])
            ->add("StudentDetails", HiddenType::class)

            ->add("TimesAweek", NumberType::class, [
                'label' => "How Many Times a Week?"
            ])
            ->add("PossibleDate", DateType::class, [
                'label' => "Possible Starting Date"
            ])
            ->add("AdditionalNote", TextareaType::class, [
                'label' => "Additional Note",
                'required' => false
            ])

            // Date and Time Selection

            ->add("Saturday", ChoiceType::class, [
                'choices'  => $this->DataService->getTimes(),
                'multiple' => true,
                'required' => false,
                'label' => "Saturday"
            ])
            ->add("Sunday", ChoiceType::class, [
                'choices'  => $this->DataService->getTimes(),
                'multiple' => true,
                'required' => false,
                'label' => "Sunday"
            ])
            ->add("Monday", ChoiceType::class, [
                'choices'  => $this->DataService->getTimes(),
                'multiple' => true,
                'required' => false,
                'label' => "Monday"
            ])
            ->add("Tuesday", ChoiceType::class, [
                'choices'  => $this->DataService->getTimes(),
                'multiple' => true,
                'required' => false,
                'label' => "Tuesday"
            ])
            ->add("Wednesday", ChoiceType::class, [
                'choices'  => $this->DataService->getTimes(),
                'multiple' => true,
                'required' => false,
                'label' => "Wednesday"
            ])
            ->add("Thursday", ChoiceType::class, [
                'choices'  => $this->DataService->getTimes(),
                'multiple' => true,
                'required' => false,
                'label' => "Thursday"
            ])
            ->add("Friday", ChoiceType::class, [
                'choices'  => $this->DataService->getTimes(),
                'multiple' => true,
                'required' => false,
                'label' => "Friday"
            ])



            ->add("Register", SubmitType::class, [
                'label' => "Register"
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
