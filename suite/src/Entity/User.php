<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $EmailAddress;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $PhoneNumber;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Password;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Address;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Photo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Timezone;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Country;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $DateOfBirth;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $BirthDate;

    /**
     * @ORM\Column(type="integer")
     */
    private $Status;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ClientID;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $RegularEvaluation;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $StudentEvaluation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $TeacherNationalID;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Gender;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $TeacherEducation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $TeacherGraduation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $CalenderLink;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ZoomLink;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $TeacherCV;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $TeacherNationalIDFrontCopy;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $TeacherNationalIDBackCopy;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $TeacherBio;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $TeacherAvailableTime;

    /**
     * @ORM\Column(type="array")
     */
    private $role = [];

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $token;

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

    public function getEmailAddress(): ?string
    {
        return $this->EmailAddress;
    }

    public function setEmailAddress(?string $EmailAddress): self
    {
        $this->EmailAddress = $EmailAddress;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->PhoneNumber;
    }

    public function setPhoneNumber(?string $PhoneNumber): self
    {
        $this->PhoneNumber = $PhoneNumber;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->Password;
    }

    public function setPassword(string $Password): self
    {
        $this->Password = $Password;

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

    public function getPhoto(): ?string
    {
        return $this->Photo;
    }

    public function setPhoto(?string $Photo): self
    {
        $this->Photo = $Photo;

        return $this;
    }

    public function getTimezone(): ?string
    {
        return $this->Timezone;
    }

    public function setTimezone(?string $Timezone): self
    {
        $this->Timezone = $Timezone;

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

    public function getDateOfBirth(): ?string
    {
        return $this->DateOfBirth;
    }

    public function setDateOfBirth(?string $DateOfBirth): self
    {
        $this->DateOfBirth = $DateOfBirth;

        return $this;
    }

    public function getBirthDate(): ?\DateTimeInterface
    {
        return $this->BirthDate;
    }

    public function setBirthDate(?\DateTimeInterface $BirthDate): self
    {
        $this->BirthDate = $BirthDate;

        return $this;
    }

    public function getStatus(): ?int
    {
        return $this->Status;
    }

    public function setStatus(int $Status): self
    {
        $this->Status = $Status;

        return $this;
    }

    public function getClientID(): ?string
    {
        return $this->ClientID;
    }

    public function setClientID(?string $ClientID): self
    {
        $this->ClientID = $ClientID;

        return $this;
    }

    public function getRegularEvaluation(): ?string
    {
        return $this->RegularEvaluation;
    }

    public function setRegularEvaluation(?string $RegularEvaluation): self
    {
        $this->RegularEvaluation = $RegularEvaluation;

        return $this;
    }

    public function getStudentEvaluation(): ?string
    {
        return $this->StudentEvaluation;
    }

    public function setStudentEvaluation(?string $StudentEvaluation): self
    {
        $this->StudentEvaluation = $StudentEvaluation;

        return $this;
    }

    public function getTeacherNationalID(): ?string
    {
        return $this->TeacherNationalID;
    }

    public function setTeacherNationalID(?string $TeacherNationalID): self
    {
        $this->TeacherNationalID = $TeacherNationalID;

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

    public function getTeacherEducation(): ?string
    {
        return $this->TeacherEducation;
    }

    public function setTeacherEducation(?string $TeacherEducation): self
    {
        $this->TeacherEducation = $TeacherEducation;

        return $this;
    }

    public function getTeacherGraduation(): ?string
    {
        return $this->TeacherGraduation;
    }

    public function setTeacherGraduation(?string $TeacherGraduation): self
    {
        $this->TeacherGraduation = $TeacherGraduation;

        return $this;
    }

    public function getCalenderLink(): ?string
    {
        return $this->CalenderLink;
    }

    public function setCalenderLink(?string $CalenderLink): self
    {
        $this->CalenderLink = $CalenderLink;

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

    public function getTeacherCV(): ?string
    {
        return $this->TeacherCV;
    }

    public function setTeacherCV(?string $TeacherCV): self
    {
        $this->TeacherCV = $TeacherCV;

        return $this;
    }

    public function getTeacherNationalIDFrontCopy(): ?string
    {
        return $this->TeacherNationalIDFrontCopy;
    }

    public function setTeacherNationalIDFrontCopy(?string $TeacherNationalIDFrontCopy): self
    {
        $this->TeacherNationalIDFrontCopy = $TeacherNationalIDFrontCopy;

        return $this;
    }

    public function getTeacherNationalIDBackCopy(): ?string
    {
        return $this->TeacherNationalIDBackCopy;
    }

    public function setTeacherNationalIDBackCopy(?string $TeacherNationalIDBackCopy): self
    {
        $this->TeacherNationalIDBackCopy = $TeacherNationalIDBackCopy;

        return $this;
    }

    public function getTeacherBio(): ?string
    {
        return $this->TeacherBio;
    }

    public function setTeacherBio(?string $TeacherBio): self
    {
        $this->TeacherBio = $TeacherBio;

        return $this;
    }

    public function getTeacherAvailableTime(): ?string
    {
        return $this->TeacherAvailableTime;
    }

    public function setTeacherAvailableTime(?string $TeacherAvailableTime): self
    {
        $this->TeacherAvailableTime = $TeacherAvailableTime;

        return $this;
    }

    public function getRole(): ?array
    {
        return $this->role;
    }

    public function setRole(array $role): self
    {
        $this->role = $role;

        return $this;
    }

    public function getToken(): ?string
    {
        return $this->token;
    }

    public function setToken(?string $token): self
    {
        $this->token = $token;

        return $this;
    }
}
