<?php

namespace App\Entity;

use App\Repository\ExpertisesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExpertisesRepository::class)]
class Expertises
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $expertise_label = null;

    #[ORM\ManyToMany(targetEntity: Doctors::class, mappedBy: 'Expertise')]
    private Collection $doctors;

    public function __construct()
    {
        $this->doctors = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getExpertiseLabel(): ?string
    {
        return $this->expertise_label;
    }

    public function setExpertiseLabel(string $expertise_label): self
    {
        $this->expertise_label = $expertise_label;

        return $this;
    }

    /**
     * @return Collection<int, Doctors>
     */
    public function getDoctors(): Collection
    {
        return $this->doctors;
    }

    public function addDoctor(Doctors $doctor): self
    {
        if (!$this->doctors->contains($doctor)) {
            $this->doctors->add($doctor);
            $doctor->addExpertise($this);
        }

        return $this;
    }

    public function removeDoctor(Doctors $doctor): self
    {
        if ($this->doctors->removeElement($doctor)) {
            $doctor->removeExpertise($this);
        }

        return $this;
    }
}
