<?php

namespace App\Controller;

use App\Service\TimeZone;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AboutController extends AbstractController
{
    private TimeZone $TimeZone;

    function __construct(TimeZone $timeZone){
        $this->TimeZone = $timeZone;
        $this->TimeZone->setTimezone(date_default_timezone_get());
    }
    /**
     * @Route("/about", name="about")
     */
    public function index(): Response
    {
        return $this->render('about/index.html.twig', [
            'controller_name' => $this->TimeZone->setTime(date("Y-m-d H:i:s"))->convoTime("Asia/Dhaka"),
        ]);
    }
}
