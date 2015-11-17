<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Hostingproduct
 */
class Hostingproduct
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
     * @var \AppBundle\Entity\Hostaction
     */
    private $hostaction;

    /**
     * @var \AppBundle\Entity\Hostingplan
     */
    private $hostingplan;

    /**
     * @var \AppBundle\Entity\Product
     */
    private $product;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $corderhosting;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->corderhosting = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Hostingproduct
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
     * Set hostaction
     *
     * @param \AppBundle\Entity\Hostaction $hostaction
     * @return Hostingproduct
     */
    public function setHostaction(\AppBundle\Entity\Hostaction $hostaction)
    {
        $this->hostaction = $hostaction;

        return $this;
    }

    /**
     * Get hostaction
     *
     * @return \AppBundle\Entity\Hostaction 
     */
    public function getHostaction()
    {
        return $this->hostaction;
    }

    /**
     * Set hostingplan
     *
     * @param \AppBundle\Entity\Hostingplan $hostingplan
     * @return Hostingproduct
     */
    public function setHostingplan(\AppBundle\Entity\Hostingplan $hostingplan)
    {
        $this->hostingplan = $hostingplan;

        return $this;
    }

    /**
     * Get hostingplan
     *
     * @return \AppBundle\Entity\Hostingplan 
     */
    public function getHostingplan()
    {
        return $this->hostingplan;
    }

    /**
     * Set product
     *
     * @param \AppBundle\Entity\Product $product
     * @return Hostingproduct
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
     * Add corderhosting
     *
     * @param \AppBundle\Entity\Corderhosting $corderhosting
     * @return Hostingproduct
     */
    public function addCorderhosting(\AppBundle\Entity\Corderhosting $corderhosting)
    {
        $this->corderhosting[] = $corderhosting;

        return $this;
    }

    /**
     * Remove corderhosting
     *
     * @param \AppBundle\Entity\Corderhosting $corderhosting
     */
    public function removeCorderhosting(\AppBundle\Entity\Corderhosting $corderhosting)
    {
        $this->corderhosting->removeElement($corderhosting);
    }

    /**
     * Get corderhosting
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCorderhosting()
    {
        return $this->corderhosting;
    }

    public function __toString()
    {
        return $this->hostingplan->getPlan();
    }
}
