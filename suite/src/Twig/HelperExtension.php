<?php

namespace App\Twig;

use App\Entity\Guardian;
use App\Repository\GuardianRepository;
use App\Repository\LoginInfoRepository;
use App\Service\LiveService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Asset\Package;
use Symfony\Component\Asset\VersionStrategy\EmptyVersionStrategy;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class HelperExtension extends AbstractExtension
{
    private Package $package;
    private EntityManagerInterface $em;
    private LoginInfoRepository $loginInfoRepository;

    public function __construct(EntityManagerInterface $em,LoginInfoRepository $loginInfoRepository)
    {
        $this->package = new Package(new EmptyVersionStrategy());
        $this->em = $em;
        $this->loginInfoRepository = $loginInfoRepository;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('Color', [$this, 'CssColor']),
            new TwigFunction('soft', [$this, 'soft']),
            new TwigFunction('tr', [$this, 'tr']),
            new TwigFunction('dd', [$this, 'debug']),
            new TwigFunction('form_child', [$this, 'form_child']),
            new TwigFunction('details', [$this, 'getData']),
            new TwigFunction('status', [$this, 'status']),
        ];
    }

    public function CssColor($value)
    {
        $colours = [
            "common" => "#a8e2e8e0"
        ];
        return $colours[$value];
    }
    public function status($value)
    {
        $values = [
            'pending' => 'info',
            'waiting' => 'primary',
            'approved' => 'success',
            'rejected' => 'danger',
            'cancelled' => 'warning',
            'deleted' => 'danger',
        ];
        return $values[strtolower($value)];
    }

    public function soft($type)
    {
        if ($type == "icon")
            return $this->package->getUrl("/images/fev.png");
        if ($type == "name")
            return $this->tr("KnowledgeHouse");
    }
    public function tr($string):string
    {
        return $string;
    }
    public function debug($array){
        dd($array);
    }
    public function form_child($string){
        $ar = explode("[", $string);
        return substr(ar[1],0,-1);
    }

    public function getData($user)
    {
        return $this->loginInfoRepository->info($user);
    }
}
