<?php

namespace App\Entity;

use App\Repository\AviabilityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: AviabilityRepository::class)]
class Aviability
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $startDate = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $endDate = null;

    #[ORM\Column]
    #[Assert\Range(
        min: 0,
        max: 60,
        notInRangeMessage: 'Le temps de vos rendez vous doit se situer entre {{ min }} et {{ max }} minutes.',
        invalidMessage: 'Le nombre de minutes doit se situer dans la tranche donnée'
    )]
    private ?int $durationDate = null;

    #[ORM\Column]
    #[Assert\Range(
        min: 0,
        max: 15,
        notInRangeMessage: 'Le temps d\'attentes entre deux rendez vous doit être entre {{ min }} et {{ max }} minutes.',
        invalidMessage: 'Le nombre de minutes doit se situer dans la tranche donnée'
    )]
    private ?int $gapDate = null;

    #[ORM\OneToMany(mappedBy: 'aviability', targetEntity: Professionnals::class)]
    private Collection $aviabilityPro;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $startTime = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $endTime = null;

    public function __construct()
    {
        $this->aviabilityPro = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->startDate;
    }

    public function setStartDate(\DateTimeInterface $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->endDate;
    }

    public function setEndDate(\DateTimeInterface $endDate): self
    {
        $this->endDate = $endDate;

        return $this;
    }

    public function getDurationDate(): ?int
    {
        return $this->durationDate;
    }

    public function setDurationDate(int $durationDate): self
    {
        $this->durationDate = $durationDate;

        return $this;
    }

    public function getGapDate(): ?int
    {
        return $this->gapDate;
    }

    public function setGapDate(int $gapDate): self
    {
        $this->gapDate = $gapDate;

        return $this;
    }

    /**
     * @return Collection<int, Professionnals>
     */
    public function getAviabilityPro(): Collection
    {
        return $this->aviabilityPro;
    }

    public function addAviabilityPro(Professionnals $aviabilityPro): self
    {
        if (!$this->aviabilityPro->contains($aviabilityPro)) {
            $this->aviabilityPro->add($aviabilityPro);
            $aviabilityPro->setAviability($this);
        }

        return $this;
    }

    public function removeAviabilityPro(Professionnals $aviabilityPro): self
    {
        if ($this->aviabilityPro->removeElement($aviabilityPro)) {
            // set the owning side to null (unless already changed)
            if ($aviabilityPro->getAviability() === $this) {
                $aviabilityPro->setAviability(null);
            }
        }

        return $this;
    }

    public function getStartTime(): ?\DateTimeInterface
    {
        return $this->startTime;
    }

    public function setStartTime(\DateTimeInterface $startTime): self
    {
        $this->startTime = $startTime;

        return $this;
    }

    public function getEndTime(): ?\DateTimeInterface
    {
        return $this->endTime;
    }

    public function setEndTime(\DateTimeInterface $endTime): self
    {
        $this->endTime = $endTime;

        return $this;
    }
}
