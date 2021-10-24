<?php

namespace App\Controller;

use App\Form\StudentType;
use App\Service\DataService;
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
    private TimeZone $timeZone;
    private DataService $DataService;

    public function __construct(TimeZone $timeZone, DataService $DataService)
    {
        $this->timeZone = $timeZone;
        $this->DataService = $DataService;
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
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $task = $form->getData();
            dd($task);
            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            // $entityManager = $this->getDoctrine()->getManager();
            // $entityManager->persist($task);
            // $entityManager->flush();

            return $this->redirectToRoute('task_success');
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
        $student = [];
        $form = $this->createFormBuilder($student)
            ->add("GuardianName", TextType::class, [
                'label' => "Guardian Name"
            ])
            ->add("Register", SubmitType::class, [
                'label' => "Register"
            ])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $task = $form->getData();
//            dd($task);
            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            // $entityManager = $this->getDoctrine()->getManager();
            // $entityManager->persist($task);
            // $entityManager->flush();

            return $this->redirectToRoute('task_success');
        }

        return $this->render('register/student.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
