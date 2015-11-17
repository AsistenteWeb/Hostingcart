<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Domainproduct
 */
class Domainproduct
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $price = 0;

    /**
     * @var \AppBundle\Entity\Domainaction
     */
    private $domainaction;

    /**
     * @var \AppBundle\Entity\Tld
     */
    private $tld;

    /**
     * @var \AppBundle\Entity\Product
     */
    private $product;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $corderdomain;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->corderdomain = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set price
     *
     * @param string $price
     * @return Domainproduct
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
     * Set domainaction
     *
     * @param \AppBundle\Entity\Domainaction $domainaction
     * @return Domainproduct
     */
    public function setDomainaction(\AppBundle\Entity\Domainaction $domainaction = null)
    {
        $this->domainaction = $domainaction;

        return $this;
    }

    /**
     * Get domainaction
     *
     * @return \AppBundle\Entity\Domainaction 
     */
    public function getDomainaction()
    {
        return $this->domainaction;
    }

    /**
     * Set tld
     *
     * @param \AppBundle\Entity\Tld $tld
     * @return Domainproduct
     */
    public function setTld(\AppBundle\Entity\Tld $tld = null)
    {
        $this->tld = $tld;

        return $this;
    }

    /**
     * Get tld
     *
     * @return \AppBundle\Entity\Tld 
     */
    public function getTld()
    {
        return $this->tld;
    }

    /**
     * Set product
     *
     * @param \AppBundle\Entity\Product $product
     * @return Domainproduct
     */
    public function setProduct(\AppBundle\Entity\Product $product = null)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return \AppBundle\Entity\Product 
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Add corderdomain
     *
     * @param \AppBundle\Entity\Corderdomain $corderdomain
     * @return Domainproduct
     */
    public function addCorderdomain(\AppBundle\Entity\Corderdomain $corderdomain)
    {
        $this->corderdomain[] = $corderdomain;

        return $this;
    }

    /**
     * Remove corderdomain
     *
     * @param \AppBundle\Entity\Corderdomain $corderdomain
     */
    public function removeCorderdomain(\AppBundle\Entity\Corderdomain $corderdomain)
    {
        $this->corderdomain->removeElement($corderdomain);
    }

    /**
     * Get corderdomain
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCorderdomain()
    {
        return $this->corderdomain;
    }

    public function __toString()
    {
        return (string) $this->getTld()->getTld();
    }
}
