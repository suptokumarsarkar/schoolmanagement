<?php

namespace App\Entity;

use App\Repository\StudentRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StudentRepository::class)
 */
class Student
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
    private $BirthDate;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Gender;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $Subjects;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $ClassDuration;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $GuardainId;

    /**
     * @ORM\Column(type="text")
     */
    private $Timezone;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $Country;

    /**
     * @ORM\Column(type="text")
     */
    private $ClassInfo;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $PossibleStartingDate;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ProfilePicture;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $Email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Status;

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

    public function getBirthDate(): ?string
    {
        return $this->BirthDate;
    }

    public function setBirthDate(?string $BirthDate): self
    {
        $this->BirthDate = $BirthDate;

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

    public function getSubjects(): ?string
    {
        return $this->Subjects;
    }

    public function setSubjects(?string $Subjects): self
    {
        $this->Subjects = $Subjects;

        return $this;
    }

    public function getClassDuration(): ?int
    {
        return $this->ClassDuration;
    }

    public function setClassDuration(?int $ClassDuration): self
    {
        $this->ClassDuration = $ClassDuration;

        return $this;
    }

    public function getGuardainId(): ?int
    {
        return $this->GuardainId;
    }

    public function setGuardainId(?int $GuardainId): self
    {
        $this->GuardainId = $GuardainId;

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

    public function getCountry(): ?string
    {
        return $this->Country;
    }

    public function setCountry(?string $Country): self
    {
        $this->Country = $Country;

        return $this;
    }

    public function getClassInfo(): ?string
    {
        return $this->ClassInfo;
    }

    public function setClassInfo(string $ClassInfo): self
    {
        $this->ClassInfo = $ClassInfo;

        return $this;
    }

    public function getPossibleStartingDate(): ?string
    {
        return $this->PossibleStartingDate;
    }

    public function setPossibleStartingDate(string $PossibleStartingDate): self
    {
        $this->PossibleStartingDate = $PossibleStartingDate;

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

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(?string $Email): self
    {
        $this->Email = $Email;

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

    public function getStatus(): ?string
    {
        return $this->Status;
    }

    public function setStatus(string $Status): self
    {
        $this->Status = $Status;

        return $this;
    }
}
