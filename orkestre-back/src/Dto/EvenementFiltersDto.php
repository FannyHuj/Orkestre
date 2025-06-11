<?php

namespace App\Dto;

use App\Entity\EvenementCategoryEnum;

Class EvenementFiltersDto {

    private ?string $location = null;
    private ?\DateTimeInterface $date = null;
    private ?int $priceMax = null;
    private ?EvenementCategoryEnum $category = null;

    
    public function __construct()
    {
        $this->date = new \DateTime();
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
     * Get the value of date
     */ 
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of date
     *
     * @return  self
     */ 
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get the value of priceMax
     */ 
    public function getPriceMax()
    {
        return $this->priceMax;
    }

    /**
     * Set the value of priceMax
     *
     * @return  self
     */ 
    public function setPriceMax($priceMax)
    {
        $this->priceMax = $priceMax;

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
}