<?php

namespace App\Twig;

use App\Entity\Guardian;
use App\Repository\GuardianRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Asset\Package;
use Symfony\Component\Asset\VersionStrategy\EmptyVersionStrategy;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class HelperExtension extends AbstractExtension
{
    private Package $package;
    private EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->package = new Package(new EmptyVersionStrategy());
        $this->em = $em;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('Color', [$this, 'CssColor']),
            new TwigFunction('soft', [$this, 'soft']),
            new TwigFunction('tr', [$this, 'tr']),
            new TwigFunction('dd', [$this, 'debug']),
            new TwigFunction('form_child', [$this, 'form_child']),
//            new TwigFunction('getData', [$this, 'getData']),
        ];
    }

    public function CssColor($value)
    {
        $colours = [
            "common" => "#a8e2e8e0"
        ];
        return $colours[$value];
    }

    public function soft($type)
    {
        if ($type == "icon")
            return $this->package->getUrl("/images/fev.png");
        if ($type == "name")
            return $this->tr("Software");
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

//    public function getData($user)
//    {
//        if($user->getUserTableName() == 'guardian')
//        {
//            return $this->em->getRepository(Guardian::class)->find($user->getUserId());
//        }
//
//        if($user->getUserTableName() == 'student')
//        {
//            return $this->em->getRepository("Student")->find($user->getUserId());
//        }
//
//        if($user->getUserTableName() == 'teacher')
//        {
//            return $this->em->getRepository("Teacher")->find($user->getUserId());
//        }
//
//        return $user;
//    }
}
