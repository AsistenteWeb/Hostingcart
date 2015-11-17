<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Hostaction
 */
class Hostaction
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $nameaction;

    /**
     * @var string
     */
    private $alias;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $hostingproduct;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->hostingproduct = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nameaction
     *
     * @param string $nameaction
     * @return Hostaction
     */
    public function setNameaction($nameaction)
    {
        $this->nameaction = $nameaction;

        return $this;
    }

    /**
     * Get nameaction
     *
     * @return string 
     */
    public function getNameaction()
    {
        return $this->nameaction;
    }

    /**
     * Set alias
     *
     * @param string $alias
     * @return Hostaction
     */
    public function setAlias($alias)
    {
        $this->alias = $alias;

        return $this;
    }

    /**
     * Get alias
     *
     * @return string 
     */
    public function getAlias()
    {
        return $this->alias;
    }

    /**
     * Add hostingproduct
     *
     * @param \AppBundle\Entity\Hostingproduct $hostingproduct
     * @return Hostaction
     */
    public function addHostingproduct(\AppBundle\Entity\Hostingproduct $hostingproduct)
    {
        $this->hostingproduct[] = $hostingproduct;

        return $this;
    }

    /**
     * Remove hostingproduct
     *
     * @param \AppBundle\Entity\Hostingproduct $hostingproduct
     */
    public function removeHostingproduct(\AppBundle\Entity\Hostingproduct $hostingproduct)
    {
        $this->hostingproduct->removeElement($hostingproduct);
    }

    /**
     * Get hostingproduct
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getHostingproduct()
    {
        return $this->hostingproduct;
    }

    public function __toString()
    {
        return $this->getNameaction();
    }
}
