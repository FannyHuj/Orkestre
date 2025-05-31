<?php

namespace App\Entity;

use App\Repository\EvenementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
    private ?\DateTime $evenementDate = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $location = null;

    #[ORM\Column(nullable: true)]
    private ?int $maxCapacity = null;

    #[ORM\Column(nullable: true)]
    private ?int $price = null;

    /**
     * @var Collection<int, User>
     */
    #[ORM\ManyToMany(targetEntity: User::class, inversedBy: 'evenements')]
    private Collection $organizerId;

    public function __construct()
    {
        $this->organizerId = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, User>
     */
    public function getOrganizerId(): Collection
    {
        return $this->organizerId;
    }

    public function addOrganizerId(User $organizerId): static
    {
        if (!$this->organizerId->contains($organizerId)) {
            $this->organizerId->add($organizerId);
        }

        return $this;
    }

    public function removeOrganizerId(User $organizerId): static
    {
        $this->organizerId->removeElement($organizerId);

        return $this;
    }
}
