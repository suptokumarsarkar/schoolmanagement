<?php

namespace App\Controller;

use App\Form\StudentType;
use App\Form\TeacherType;
use App\Service\DataService;
use App\Service\LiveService;
use App\Service\RegisterService;
use App\Service\TimeZone;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/register", name="register")
 */
class RegisterController extends AbstractController
{
    private RegisterService $RegisterService;

    public function __construct(RegisterService $RegisterService)
    {
        $this->RegisterService = $RegisterService;
    }

    /**
     * @Route("/", name="_index")
     */
    public function index(): Response
    {
        return $this->redirectToRoute("register_student");
    }

    /**
     * @Route("/student", name="_student")
     */
    public function student(Request $request): Response
    {
        $student = [];
        $form = $this->createForm(StudentType::class, $student);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $task = $form->getData();

            $this->RegisterService->registerStudent($task);

            $this->addFlash('success', 'User Registered Successfully.');


            return $this->redirectToRoute('site');
        }

        return $this->render('register/student.html.twig', [
            'form' => $form->createView()
        ]);
    }


    /**
     * @Route("/teacher", name="_teacher")
     */
    public function teacher(Request $request): Response
    {
        $teacher = [];
        $form = $this->createForm(TeacherType::class, $teacher);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $task = $form->getData();

            $this->RegisterService->registerTeacher($task);

            $this->addFlash('success', 'Teacher Registered Successfully.');


            return $this->redirectToRoute('site');
        }

        return $this->render('register/teacher.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
