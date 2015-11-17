<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Hostingplan
 */
class Hostingplan
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $plan;

    /**
     * @var string
     */
    private $alias;

    /**
     * @var string
     */
    private $description;

    /**
     * @var integer
     */
    private $disksize;

    /**
     * @var integer
     */
    private $bandwidth;

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
     * Set plan
     *
     * @param string $plan
     * @return Hostingplan
     */
    public function setPlan($plan)
    {
        $this->plan = $plan;

        return $this;
    }

    /**
     * Get plan
     *
     * @return string 
     */
    public function getPlan()
    {
        return $this->plan;
    }

    /**
     * Set alias
     *
     * @param string $alias
     * @return Hostingplan
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
     * Set description
     *
     * @param string $description
     * @return Hostingplan
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set disksize
     *
     * @param integer $disksize
     * @return Hostingplan
     */
    public function setDisksize($disksize)
    {
        $this->disksize = $disksize;

        return $this;
    }

    /**
     * Get disksize
     *
     * @return integer 
     */
    public function getDisksize()
    {
        return $this->disksize;
    }

    /**
     * Set bandwidth
     *
     * @param integer $bandwidth
     * @return Hostingplan
     */
    public function setBandwidth($bandwidth)
    {
        $this->bandwidth = $bandwidth;

        return $this;
    }

    /**
     * Get bandwidth
     *
     * @return integer 
     */
    public function getBandwidth()
    {
        return $this->bandwidth;
    }

    /**
     * Add hostingproduct
     *
     * @param \AppBundle\Entity\Hostingproduct $hostingproduct
     * @return Hostingplan
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
        return $this->getPlan();
    }
}
