<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Domainaction
 */
class Domainaction
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
    private $domainproduct;

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
     * Set nameaction
     *
     * @param string $nameaction
     * @return Domainaction
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
     * @return Domainaction
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
     * Add domainproduct
     *
     * @param \AppBundle\Entity\Domainproduct $domainproduct
     * @return Domainaction
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
}
