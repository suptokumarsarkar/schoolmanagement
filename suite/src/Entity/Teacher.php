<?php

namespace App\Entity;

use App\Repository\TeacherRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TeacherRepository::class)
 */
class Teacher
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
    private $FullName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $NationalIdNumber;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Graduation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Degree;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $BirthDate;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $MobileNumber;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Whatsapp;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Address;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $StreetAddress;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $City;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Country;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Gender;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Nationality;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $JobDescription;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $BioGraphy;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $ZoomLink;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Timezone;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $AvailableTimes;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $AvailableHours;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $IdPhotoCopy;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $CertificatesPhotoCopy;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $ProfilePicture;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $Resume;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFullName(): ?string
    {
        return $this->FullName;
    }

    public function setFullName(string $FullName): self
    {
        $this->FullName = $FullName;

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

    public function getNationalIdNumber(): ?string
    {
        return $this->NationalIdNumber;
    }

    public function setNationalIdNumber(?string $NationalIdNumber): self
    {
        $this->NationalIdNumber = $NationalIdNumber;

        return $this;
    }

    public function getGraduation(): ?string
    {
        return $this->Graduation;
    }

    public function setGraduation(?string $Graduation): self
    {
        $this->Graduation = $Graduation;

        return $this;
    }

    public function getDegree(): ?string
    {
        return $this->Degree;
    }

    public function setDegree(?string $Degree): self
    {
        $this->Degree = $Degree;

        return $this;
    }

    public function getBirthDate(): ?string
    {
        return $this->BirthDate;
    }

    public function setBirthDate(?string $BirthDate): self
    {
        $this->BirthDate = $BirthDate;

        return $this;
    }

    public function getMobileNumber(): ?string
    {
        return $this->MobileNumber;
    }

    public function setMobileNumber(?string $MobileNumber): self
    {
        $this->MobileNumber = $MobileNumber;

        return $this;
    }

    public function getWhatsapp(): ?string
    {
        return $this->Whatsapp;
    }

    public function setWhatsapp(?string $Whatsapp): self
    {
        $this->Whatsapp = $Whatsapp;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->Address;
    }

    public function setAddress(?string $Address): self
    {
        $this->Address = $Address;

        return $this;
    }

    public function getStreetAddress(): ?string
    {
        return $this->StreetAddress;
    }

    public function setStreetAddress(?string $StreetAddress): self
    {
        $this->StreetAddress = $StreetAddress;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->City;
    }

    public function setCity(?string $City): self
    {
        $this->City = $City;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->Country;
    }

    public function setCountry(?string $Country): self
    {
        $this->Country = $Country;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->Gender;
    }

    public function setGender(?string $Gender): self
    {
        $this->Gender = $Gender;

        return $this;
    }

    public function getNationality(): ?string
    {
        return $this->Nationality;
    }

    public function setNationality(?string $Nationality): self
    {
        $this->Nationality = $Nationality;

        return $this;
    }

    public function getJobDescription(): ?string
    {
        return $this->JobDescription;
    }

    public function setJobDescription(?string $JobDescription): self
    {
        $this->JobDescription = $JobDescription;

        return $this;
    }

    public function getBioGraphy(): ?string
    {
        return $this->BioGraphy;
    }

    public function setBioGraphy(?string $BioGraphy): self
    {
        $this->BioGraphy = $BioGraphy;

        return $this;
    }

    public function getZoomLink(): ?string
    {
        return $this->ZoomLink;
    }

    public function setZoomLink(?string $ZoomLink): self
    {
        $this->ZoomLink = $ZoomLink;

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

    public function getAvailableTimes(): ?string
    {
        return $this->AvailableTimes;
    }

    public function setAvailableTimes(?string $AvailableTimes): self
    {
        $this->AvailableTimes = $AvailableTimes;

        return $this;
    }

    public function getAvailableHours(): ?string
    {
        return $this->AvailableHours;
    }

    public function setAvailableHours(?string $AvailableHours): self
    {
        $this->AvailableHours = $AvailableHours;

        return $this;
    }

    public function getIdPhotoCopy(): ?string
    {
        return $this->IdPhotoCopy;
    }

    public function setIdPhotoCopy(?string $IdPhotoCopy): self
    {
        $this->IdPhotoCopy = $IdPhotoCopy;

        return $this;
    }

    public function getCertificatesPhotoCopy(): ?string
    {
        return $this->CertificatesPhotoCopy;
    }

    public function setCertificatesPhotoCopy(?string $CertificatesPhotoCopy): self
    {
        $this->CertificatesPhotoCopy = $CertificatesPhotoCopy;

        return $this;
    }

    public function getProfilePicture(): ?string
    {
        return $this->ProfilePicture;
    }

    public function setProfilePicture(?string $ProfilePicture): self
    {
        $this->ProfilePicture = $ProfilePicture;

        return $this;
    }

    public function getResume(): ?string
    {
        return $this->Resume;
    }

    public function setResume(?string $Resume): self
    {
        $this->Resume = $Resume;

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
}
