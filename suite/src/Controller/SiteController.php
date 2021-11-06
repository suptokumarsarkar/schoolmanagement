<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SiteController extends AbstractController
{
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
}
