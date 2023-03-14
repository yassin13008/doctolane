<?php

namespace App\Entity;

use App\Entity\Patients;
use App\Entity\Professionnals;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\AppointmentRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: AppointmentRepository::class)]
class Appointment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $Title = null;


    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $start = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $end = null;



    #[ORM\ManyToMany(targetEntity: Patients::class, inversedBy: 'appointments')]
    private Collection $patient;

    #[ORM\ManyToMany(targetEntity: Professionnals::class, inversedBy: 'appointments')]
    private Collection $professionnal;

    public function __construct()
    {
        $this->patient = new ArrayCollection();
        $this->professionnal = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->Title;
    }

    public function setTitle(?string $Title): self
    {
        $this->Title = $Title;

        return $this;
    }

    public function getStart(): ?\DateTimeInterface
    {
        return $this->start;
    }

    public function setStart(\DateTimeInterface $start): self
    {
        $this->start = $start;

        return $this;
    }

    public function getEnd(): ?\DateTimeInterface
    {
        return $this->end;
    }

    public function setEnd(\DateTimeInterface $end): self
    {
        $this->end = $end;

        return $this;
    }



    /**
     * @return Collection<int, Patients>
     */
    public function getPatient(): Collection
    {
        return $this->patient;
    }

    public function addPatient(Patients $patient): self
    {
        if (!$this->patient->contains($patient)) {
            $this->patient->add($patient);
        }

        return $this;
    }

    public function removePatient(Patients $patient): self
    {
        $this->patient->removeElement($patient);

        return $this;
    }

    /**
     * @return Collection<int, Professionnals>
     */
    public function getProfessionnal(): Collection
    {
        return $this->professionnal;
    }

    public function addProfessionnal(Professionnals $professionnal): self
    {
        if (!$this->professionnal->contains($professionnal)) {
            $this->professionnal->add($professionnal);
        }

        return $this;
    }

    public function removeProfessionnal(Professionnals $professionnal): self
    {
        $this->professionnal->removeElement($professionnal);

        return $this;
    }


}
