<?php

namespace App\Entity;

use App\Repository\SettingsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SettingsRepository::class)
 */
class Settings
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ADMIN_SECRET;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $LOGO;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getADMINSECRET(): ?string
    {
        return $this->ADMIN_SECRET;
    }

    public function setADMINSECRET(string $ADMIN_SECRET): self
    {
        $this->ADMIN_SECRET = $ADMIN_SECRET;

        return $this;
    }

    public function getLOGO(): ?string
    {
        return $this->LOGO;
    }

    public function setLOGO(?string $LOGO): self
    {
        $this->LOGO = $LOGO;

        return $this;
    }
}
