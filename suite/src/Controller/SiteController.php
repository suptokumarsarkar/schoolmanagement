<?php

namespace App\Controller;

use App\Form\AccoutEditType;
use App\Service\RegisterService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class SiteController extends AbstractController
{
    private RegisterService $RegisterService;

    public function __construct(RegisterService $RegisterService)
    {
        $this->RegisterService = $RegisterService;
    }

    /**
     * @Route("/", name="site")
     */
    public function index(): Response
    {
        if(!$this->get('security.authorization_checker')->isGranted('ROLE_USER'))
        {
            return $this->redirectToRoute('app_login');
        }
        return $this->render('site/index.html.twig', [
            'controller_name' => 'SiteController',
        ]);
    }

    /**
     * @Route("/account", name="account")
     */
    public function account(): Response
    {
        if(!$this->get('security.authorization_checker')->isGranted('ROLE_USER'))
        {
            return $this->redirectToRoute('app_login');
        }
        return $this->render('site/account.html.twig');
    }


    /**
     * @Route("/profile/edit", name="profile.edit")
     */
    public function editProfile(Request $request,TokenStorageInterface $tokenStorage): Response
    {
        if(!$this->get('security.authorization_checker')->isGranted('ROLE_USER'))
        {
            return $this->redirectToRoute('app_login');
        }
        $data = [];
        $form = $this->createForm(AccoutEditType::class, $data);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){

            $task = $form->getData();

            if ($this->RegisterService->editProfile($task)){
                $this->addFlash('success', 'Successfully Saved Information.');
            }else{
                $this->addFlash('error', 'Failed to Save Information');
            }


            return $this->redirect($request->getPathInfo());
        }
        return $this->render('profile/edit.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
