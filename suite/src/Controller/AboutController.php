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
        $contry = [
            "Bangladesh" => "Asia/Dhaka",
            "India" => "Asia/Kolkata",
            "Ireland" => "Europe/Dublin",
            "America" => "America/New_York",
        ];

        $timer = [];

        foreach($contry as $key=>$value){
            array_push($timer, [$key, $this->TimeZone->setTime(date("Y-m-d H:i:s"))->convoTime($value)]);
        }
        return $this->render('about/index.html.twig', [
            'timer' => $timer,
        ]);
    }
}
