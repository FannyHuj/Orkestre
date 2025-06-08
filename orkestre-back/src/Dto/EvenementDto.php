<?php

namespace App\Dto;

use App\Entity\EvenementCategoryEnum;

Class EvenementDto {

    public ?int $id = null;
    public ?string $title = null;
    public ?string $description = null;
    public ?\DateTimeInterface $evenementDate = null;
    public ?string $location = null;
    public ?int $maxCapacity = null;
    public ?int $price = null;
    public ?EvenementCategoryEnum $category = null;
    public ?int $organizerId = null;


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of evenementDate
     */ 
    public function getEvenementDate()
    {
        return $this->evenementDate;
    }

    /**
     * Set the value of evenementDate
     *
     * @return  self
     */ 
    public function setEvenementDate($evenementDate)
    {
        $this->evenementDate = $evenementDate;

        return $this;
    }

    /**
     * Get the value of location
     */ 
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set the value of location
     *
     * @return  self
     */ 
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get the value of maxCapacity
     */ 
    public function getMaxCapacity()
    {
        return $this->maxCapacity;
    }

    /**
     * Set the value of maxCapacity
     *
     * @return  self
     */ 
    public function setMaxCapacity($maxCapacity)
    {
        $this->maxCapacity = $maxCapacity;

        return $this;
    }

    /**
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */ 
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of category
     */ 
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set the value of category
     *
     * @return  self
     */ 
    public function setCategory($category)
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