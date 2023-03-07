<?php

namespace App\Entity;

use App\Repository\SpecialitiesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SpecialitiesRepository::class)]
class Specialities
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $speciality_label = null;

    #[ORM\OneToMany(mappedBy: 'speciality', targetEntity: Professionnals::class)]
    private Collection $professionnals;

    public function __construct()
    {
        $this->professionnals = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSpecialityLabel(): ?string
    {
        return $this->speciality_label;
    }

    public function setSpecialityLabel(string $speciality_label): self
    {
        $this->speciality_label = $speciality_label;

        return $this;
    }

    /**
     * @return Collection<int, Professionals>
     */
    public function getProfessionals(): Collection
    {
        return $this->professionnals;
    }

    public function addProfessional(Professionnals $professional): self
    {
        if (!$this->professionnals->contains($professional)) {
            $this->professionnals->add($professional);
            $professional->setSpeciality($this);
        }

        return $this;
    }

    public function removeProfessional(Professionnals $professional): self
    {
        if ($this->professionnals->removeElement($professional)) {
            // set the owning side to null (unless already changed)
            if ($professional->getSpeciality() === $this) {
                $professional->setSpeciality(null);
            }
        }

        return $this;
    }
}
