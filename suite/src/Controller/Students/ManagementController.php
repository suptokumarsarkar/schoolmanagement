<?php

namespace App\Controller\Students;

use App\Form\StudentLoginAccessType;
use App\Repository\GuardianRepository;
use App\Repository\LoginInfoRepository;
use App\Repository\StudentRepository;
use App\Service\TimeZone;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class ManagementController extends AbstractController
{
    private LoginInfoRepository $loginInfoRepository;
    private TimeZone $timeZone;
    private TokenStorageInterface $tokenStorage;
    private GuardianRepository $guardianRepository;
    private StudentRepository $studentRepository;

    function __construct(LoginInfoRepository $loginInfoRepository, TimeZone $timeZone, TokenStorageInterface $tokenStorage, GuardianRepository $guardianRepository, StudentRepository $studentRepository)
    {
        $this->loginInfoRepository = $loginInfoRepository;
        $this->timeZone = $timeZone;
        $this->tokenStorage = $tokenStorage;
        $this->guardianRepository = $guardianRepository;
        $this->studentRepository = $studentRepository;
    }

    /**
     * @Route("/students/management", name="students.manage")
     */
    public function index(): Response
    {
        $auth = $this->tokenStorage->getToken()->getUser();
        $students = [];
        if ($auth->getUserTableName() == 'guardian') {
            $students = $this->studentRepository->findBy(['GuardainId' => $auth->getUserId()]);
        }
        foreach ($students as $student)
        {
            if(strtolower($student->getStatus()) == "pending")
            {
                $student->isLogable = false;
            }else{
                $student->isLogable = true;
            }
        }
        return $this->render('students/management/index.html.twig', [
            'students' => $students,
        ]);
    }
    /**
     * @Route("/students/login/create/{id}", name="students.createLogin")
     */
    public function studentCreateLogin($id, Request $request): Response
    {
        $student = $this->studentRepository->find($id);
        $guardian = $this->guardianRepository->find($student->getGuardainId());
        if(strtolower($student->getStatus()) != 'pending'){
            $this->addFlash('error', "Sorry This Student already has login access.");
            return $this->redirectToRoute("students.manage");
        }
        $data = [
            'student'=>$student,
            'redirect'=>$request->getPathInfo()
        ];

        $form = $this->createForm(StudentLoginAccessType::class, $data);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $data = $form->getData();
            dd($data);
        }

        return $this->render('students/management/createLogin.html.twig',[
            'form' => $form->createView()
        ]);

    }
    /**
     * @Route("/students/login/update/{id}", name="students.updateLogin")
     */
    public function studentUpdateLogin($id): Response
    {

    }
}
