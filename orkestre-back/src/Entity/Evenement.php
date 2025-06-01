<?php

namespace App\Entity;

use App\Repository\EvenementRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EvenementRepository::class)]
class Evenement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $title = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeInterface $evenementDate = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $location = null;

    #[ORM\Column(nullable: true)]
    private ?int $maxCapacity = null;

    #[ORM\Column(nullable: true)]
    private ?int $price = null;

    #[ORM\Column(type: 'string', enumType: EvenementCategoryEnum::class)]
    private ?EvenementCategoryEnum $category = null;

    #[ORM\ManyToOne(inversedBy: 'evenement')]
    private ?User $organizerId = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getEvenementDate(): ?\DateTime
    {
        return $this->evenementDate;
    }

    public function setEvenementDate(?\DateTime $evenementDate): static
    {
        $this->evenementDate = $evenementDate;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(?string $location): static
    {
        $this->location = $location;

        return $this;
    }

    public function getMaxCapacity(): ?int
    {
        return $this->maxCapacity;
    }

    public function setMaxCapacity(?int $maxCapacity): static
    {
        $this->maxCapacity = $maxCapacity;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(?int $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getCategory(): ?EvenementCategoryEnum
    {
        return $this->category;
    }

    public function setCategory(?EvenementCategoryEnum $category): static
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get the value of organizerId
     */ 
    public function getOrganizerId()
    {
        return $this->organizerId;
    }

    /**
     * Set the value of organizerId
     *
     * @return  self
     */ 
    public function setOrganizerId($organizerId)
    {
        $this->organizerId = $organizerId;

        return $this;
    }
}
