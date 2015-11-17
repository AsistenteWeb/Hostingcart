<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Domainprovider
 */
class Domainprovider
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $nameprovider;

    /**
     * @var string
     */
    private $module;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $tld;

    /**
     * @var boolean
     */
    private $api;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tld = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set nameprovider
     *
     * @param string $nameprovider
     * @return Domainprovider
     */
    public function setNameprovider($nameprovider)
    {
        $this->nameprovider = $nameprovider;

        return $this;
    }

    /**
     * Get nameprovider
     *
     * @return string 
     */
    public function getNameprovider()
    {
        return $this->nameprovider;
    }

    /**
     * Set module
     *
     * @param string $module
     * @return Domainprovider
     */
    public function setModule($module)
    {
        $this->module = $module;

        return $this;
    }

    /**
     * Get module
     *
     * @return string 
     */
    public function getModule()
    {
        return $this->module;
    }

    /**
     * Add tld
     *
     * @param \AppBundle\Entity\Tld $tld
     * @return Domainprovider
     */
    public function addTld(\AppBundle\Entity\Tld $tld)
    {
        $this->tld[] = $tld;

        return $this;
    }

    /**
     * Remove tld
     *
     * @param \AppBundle\Entity\Tld $tld
     */
    public function removeTld(\AppBundle\Entity\Tld $tld)
    {
        $this->tld->removeElement($tld);
    }

    /**
     * Get tld
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTld()
    {
        return $this->tld;
    }

    public function __toString()
    {
        return $this->nameprovider;
    }

    /**
     * Set api
     *
     * @param boolean $api
     * @return Domainprovider
     */
    public function setApi($api)
    {
        $this->api = $api;

        return $this;
    }

    /**
     * Get api
     *
     * @return boolean 
     */
    public function getApi()
    {
        return $this->api;
    }
}
