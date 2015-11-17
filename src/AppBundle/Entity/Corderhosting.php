<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Corderhosting
 */
class Corderhosting
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $domaintld;

    /**
     * @var string
     */
    private $price;

    /**
     * @var boolean
     */
    private $executed;

    /**
     * @var \AppBundle\Entity\Hostingproduct
     */
    private $hostingproduct;

    /**
     * @var \AppBundle\Entity\Corder
     */
    private $corder;

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
     * Set domaintld
     *
     * @param string $domaintld
     * @return Corderhosting
     */
    public function setDomaintld($domaintld)
    {
        $this->domaintld = $domaintld;

        return $this;
    }

    /**
     * Get domaintld
     *
     * @return string
     */
    public function getDomaintld()
    {
        return $this->domaintld;
    }

    /**
     * Set price
     *
     * @param string $price
     * @return Corderhosting
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
     * @return Corderhosting
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
     * Set hostingproduct
     *
     * @param \AppBundle\Entity\Hostingproduct $hostingproduct
     * @return Corderhosting
     */
    public function setHostingproduct(\AppBundle\Entity\Hostingproduct $hostingproduct = null)
    {
        $this->hostingproduct = $hostingproduct;

        return $this;
    }

    /**
     * Get hostingproduct
     *
     * @return \AppBundle\Entity\Hostingproduct
     */
    public function getHostingproduct()
    {
        return $this->hostingproduct;
    }

    /**
     * Set corder
     *
     * @param \AppBundle\Entity\Corder $corder
     * @return Corderhosting
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
}
