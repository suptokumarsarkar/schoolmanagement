<?php
namespace App\Service\LiveServices;

use App\Entity\Settings;
use App\Repository\SettingsRepository;
use Doctrine\ORM\EntityManagerInterface;

class SettingService
{
    public $ADMIN_SECRET;
    public $LOGO;

    function __construct(EntityManagerInterface $em,SettingsRepository $settingsRepository){
        if($settingsRepository->findOneBy([]) == null){
            $settings = new Settings;
            $settings->setADMINSECRET("123456789");
            $settings->setLOGO("/images/fev.png");
            $em->persist($settings);
            $em->flush();
        }
        $settingsData = $settingsRepository->findOneBy([]);
        $this->ADMIN_SECRET = $settingsData->getADMINSECRET();
        $this->LOGO = $settingsData->getLOGO();
    }

}
