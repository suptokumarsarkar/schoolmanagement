<?php

namespace App\Form;

use App\Service\DataService;
use App\Service\TimeZone;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class TeacherType extends AbstractType
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
            ->add("FullName", TextType::class, [
                'label' => "Full Name"
            ])
            ->add("Email", EmailType::class, [
                'label' => "Email"
            ])
            ->add("password", PasswordType::class, [
                'label' => "Password"
            ])
            ->add("Whatsapp", TextType::class, [
                'label' => "Whatsapp"
            ])
            ->add("BirthDate", DateType::class, [
                'label' => "Birth Date",
                'years'=>range(1950, 2200),
            ])
            ->add("NationalIdNumber", TextType::class, [
                'label' => "National ID Number"
            ])
            /*->add("AvailableHours", TextType::class, [
                'label' => "Available Hours"
            ])*/
            ->add("City", TextType::class, [
                'label' => "City"
            ])
            ->add("StreetAddress", TextType::class, [
                'label' => "Street Address"
            ])
            ->add("Country", ChoiceType::class, [
                'choices'  => $this->DataService->getCountries(),
                'label' => "Country"
            ])
            ->add("ProfilePicture", FileType::class, [
                'label' => "Profile Picture"
            ])
            ->add("IdPhotoCopy", FileType::class, [
                'label' => "ID Photo Copy"
            ])
            ->add("CertificatesPhotoCopy", FileType::class, [
                'label' => "Certificates Photo Copy"
            ])
            ->add("Resume", FileType::class, [
                'label' => "Resume"
            ])
            ->add("Timezone", ChoiceType::class, [
                'choices'  => $this->timeZone->getTimezoneList(),
                'label' => "Timezone"
            ])

            /*
             * Second Page
             * This Data will Come After Clicking The next Button
             */
            ->add("ZoomLink", TextType::class, [
                'label' => "Zoom Link",

            ])

            ->add("Gender", ChoiceType::class, [
                'label' => "Gender",
                'choices'=>[
                    'Male'=>'Male',
                    'Female'=>'Female',
                    'Other'=>'Other',
                ]
            ])
            ->add("Nationality", TextType::class, [
                'label' => "Nationality"
            ])
            ->add("JobDescription", TextareaType::class, [
                'label' => "Job Description",
                'required' => false
            ])
            ->add("BioGraphy", TextareaType::class, [
                'label' => "Biography",
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

}
