<?php

namespace App\Service;

use App\Entity\Guardian;
use App\Entity\LoginInfo;
use App\Entity\Student;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class RegisterService
{
    private EntityManagerInterface $em;
    private LiveService $LiveService;
    private UserPasswordHasherInterface $passwordEncoder;

    function __construct(EntityManagerInterface $em, LiveService $liveService, UserPasswordHasherInterface $passwordHasherEncoder)
    {
        $this->em = $em;
        $this->LiveService = $liveService;
        $this->passwordEncoder = $passwordHasherEncoder;
    }
    public function registerStudent($form)
    {

        $Guardain = $this->registerGuardian($form);

        $students = json_decode($form['StudentDetails']);


        foreach ($students as $student){
            $user = new Student;
            $user->setFullName($student->StudentName);
            $user->setBirthDate($student->BirthDate);
            $user->setGender($student->Gender);
            $user->setSubjects(json_encode($student->Subject));
            $user->setClassDuration($student->ClassDuration);
            $user->setProfilePicture($Guardain->getProfilePicture());
            $user->setCountry($Guardain->getCountry());
            $user->setEmail($Guardain->getEmail());
            $user->setTimezone($Guardain->getTimezone());
            $user->setPassword($Guardain->getPassword());
            $user->setStatus("PENDING");
            $user->setClassInfo($Guardain->getClassDetails());
            $user->setGuardainId($Guardain->getId());

            $this->em->persist($user);
            $this->em->flush();

//            $this->registerUser($user->getEmail(), $user->getPassword(), $user->getId(), "student", ['ROLE_USER']);
        }
    }

    public function registerUser($email, $password, $id, $table, $role){
        $user = new LoginInfo;
        $user->setEmail($email);
        $user->setPassword($this->passwordEncoder->hashPassword($user, $password));
        $user->setRoles($role);
        $user->setUserId($id);
        $user->setUserTableName($table);

        $this->em->persist($user);
        $this->em->flush();

    }

    public function registerGuardian($form)
    {
        $user = new Guardian;
        $user->setName($form['GuardianName']);
        $user->setEmail($form['Email']);
        $user->setWhatsApp($form['Whatsapp']);
        $user->setTelegram($form['Telegram']);
        $user->setCity($form['AddressCity']);
        $user->setState($form['AddressState']);
        $user->setCountry($form['Country']);
        $user->setTimesAweek($form['TimesAweek']);
        $user->setAdditionalNote($form['AdditionalNote']);
        $user->setTimezone($form['Timezone']);
        $user->setPossibleStartingDate($form['PossibleDate']->format("Y-m-d"));
        $user->setClassDetails($this->manageClassDetails($form));
        $user->setProfilePicture($this->LiveService->moveUploadedFile($form['ProfilePicture'], "public/uploads/","uploads/", "profile_".time()));
        $user->setPassword($form['Password']);




        $this->em->persist($user);

        // actually executes the queries (i.e. the INSERT query)
        $this->em->flush();

        $this->registerUser($user->getEmail(), $user->getPassword(), $user->getId(), "guardian", ['ROLE_USER']);
        return $user;


    }

    public function manageClassDetails($form): string
    {
        $class = [];
        array_push($class, $form['Saturday'], $form['Sunday'], $form['Monday'], $form['Tuesday'], $form['Wednesday'], $form['Thursday'], $form['Friday']);
        return json_encode($class);
    }

}