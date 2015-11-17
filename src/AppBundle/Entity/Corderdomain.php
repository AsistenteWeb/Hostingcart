<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Corderdomain
 */
class Corderdomain
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $domain;

    /**
     * @var string
     */
    private $price;

    /**
     * @var boolean
     */
    private $executed;

    /**
     * @var \AppBundle\Entity\Corder
     */
    private $corder;

    /**
     * @var \AppBundle\Entity\Domainproduct
     */
    private $domainproduct;


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
     * Set domain
     *
     * @param string $domain
     * @return Corderdomain
     */
    public function setDomain($domain)
    {
        $this->domain = $domain;

        return $this;
    }

    /**
     * Get domain
     *
     * @return string 
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * Set price
     *
     * @param string $price
     * @return Corderdomain
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set executed
     *
     * @param boolean $executed
     * @return Corderdomain
     */
    public function setExecuted($executed)
    {
        $this->executed = $executed;

        return $this;
    }

    /**
     * Get executed
     *
     * @return boolean 
     */
    public function getExecuted()
    {
        return $this->executed;
    }

    /**
     * Set corder
     *
     * @param \AppBundle\Entity\Corder $corder
     * @return Corderdomain
     */
    public function setCorder(\AppBundle\Entity\Corder $corder = null)
    {
        $this->corder = $corder;

        return $this;
    }

    /**
     * Get corder
     *
     * @return \AppBundle\Entity\Corder 
     */
    public function getCorder()
    {
        return $this->corder;
    }

    /**
     * Set domainproduct
     *
     * @param \AppBundle\Entity\Domainproduct $domainproduct
     * @return Corderdomain
     */
    public function setDomainproduct(\AppBundle\Entity\Domainproduct $domainproduct)
    {
        $this->domainproduct = $domainproduct;

        return $this;
    }

    /**
     * Get domainproduct
     *
     * @return \AppBundle\Entity\Domainproduct 
     */
    public function getDomainproduct()
    {
        return $this->domainproduct;
    }
}
