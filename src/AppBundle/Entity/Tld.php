<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tld
 */
class Tld
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $tld;

    /**
     * @var boolean
     */
    private $enable;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $domainproduct;

    /**
     * @var \AppBundle\Entity\Domainprovider
     */
    private $domainprovider;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->domainproduct = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set tld
     *
     * @param string $tld
     * @return Tld
     */
    public function setTld($tld)
    {
        $this->tld = $tld;

        return $this;
    }

    /**
     * Get tld
     *
     * @return string 
     */
    public function getTld()
    {
        return $this->tld;
    }

    /**
     * Set enable
     *
     * @param boolean $enable
     * @return Tld
     */
    public function setEnable($enable)
    {
        $this->enable = $enable;

        return $this;
    }

    /**
     * Get enable
     *
     * @return boolean 
     */
    public function getEnable()
    {
        return $this->enable;
    }

    /**
     * Add domainproduct
     *
     * @param \AppBundle\Entity\Domainproduct $domainproduct
     * @return Tld
     */
    public function addDomainproduct(\AppBundle\Entity\Domainproduct $domainproduct)
    {
        $this->domainproduct[] = $domainproduct;

        return $this;
    }

    /**
     * Remove domainproduct
     *
     * @param \AppBundle\Entity\Domainproduct $domainproduct
     */
    public function removeDomainproduct(\AppBundle\Entity\Domainproduct $domainproduct)
    {
        $this->domainproduct->removeElement($domainproduct);
    }

    /**
     * Get domainproduct
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDomainproduct()
    {
        return $this->domainproduct;
    }

    /**
     * Set domainprovider
     *
     * @param \AppBundle\Entity\Domainprovider $domainprovider
     * @return Tld
     */
    public function setDomainprovider(\AppBundle\Entity\Domainprovider $domainprovider)
    {
        $this->domainprovider = $domainprovider;

        return $this;
    }

    /**
     * Get domainprovider
     *
     * @return \AppBundle\Entity\Domainprovider 
     */
    public function getDomainprovider()
    {
        return $this->domainprovider;
    }

    public function __toString()
    {
        return (string) $this->tld;
    }
}
