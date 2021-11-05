<?php

namespace App\Entity;

use App\Repository\GuardianRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GuardianRepository::class)
 */
class Guardian
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $Name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $WhatsApp;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Telegram;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $City;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $State;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Country;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ProfilePicture;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $NumberofStudetns;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $TimesAweek;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $AdditionalNote;

    /**
     * @ORM\Column(type="json", nullable=true)
     */
    private $ClassDetails = [];

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Timezone;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $PossibleStartingDate;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }

    public function getWhatsApp(): ?string
    {
        return $this->WhatsApp;
    }

    public function setWhatsApp(?string $WhatsApp): self
    {
        $this->WhatsApp = $WhatsApp;

        return $this;
    }

    public function getTelegram(): ?string
    {
        return $this->Telegram;
    }

    public function setTelegram(?string $Telegram): self
    {
        $this->Telegram = $Telegram;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->City;
    }

    public function setCity(string $City): self
    {
        $this->City = $City;

        return $this;
    }

    public function getState(): ?string
    {
        return $this->State;
    }

    public function setState(string $State): self
    {
        $this->State = $State;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->Country;
    }

    public function setCountry(string $Country): self
    {
        $this->Country = $Country;

        return $this;
    }

    public function getProfilePicture(): ?string
    {
        return $this->ProfilePicture;
    }

    public function setProfilePicture(string $ProfilePicture): self
    {
        $this->ProfilePicture = $ProfilePicture;

        return $this;
    }

    public function getNumberofStudetns(): ?int
    {
        return $this->NumberofStudetns;
    }

    public function setNumberofStudetns(?int $NumberofStudetns): self
    {
        $this->NumberofStudetns = $NumberofStudetns;

        return $this;
    }

    public function getTimesAweek(): ?int
    {
        return $this->TimesAweek;
    }

    public function setTimesAweek(?int $TimesAweek): self
    {
        $this->TimesAweek = $TimesAweek;

        return $this;
    }

    public function getAdditionalNote(): ?string
    {
        return $this->AdditionalNote;
    }

    public function setAdditionalNote(?string $AdditionalNote): self
    {
        $this->AdditionalNote = $AdditionalNote;

        return $this;
    }

    public function getClassDetails(): string
    {
        return $this->ClassDetails;
    }

    public function setClassDetails(string $ClassDetails): self
    {
        $this->ClassDetails = $ClassDetails;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getTimezone(): ?string
    {
        return $this->Timezone;
    }

    public function setTimezone(string $Timezone): self
    {
        $this->Timezone = $Timezone;

        return $this;
    }

    public function getPossibleStartingDate(): ?string
    {
        return $this->PossibleStartingDate;
    }

    public function setPossibleStartingDate(?string $PossibleStartingDate): self
    {
        $this->PossibleStartingDate = $PossibleStartingDate;

        return $this;
    }
}
