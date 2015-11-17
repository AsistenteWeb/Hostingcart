<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Domaindns
 */
class Domaindns
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $dns;

    /**
     * @var \AppBundle\Entity\Serverdomain
     */
    private $serverdomain;


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
     * Set dns
     *
     * @param string $dns
     * @return Domaindns
     */
    public function setDns($dns)
    {
        $this->dns = $dns;

        return $this;
    }

    /**
     * Get dns
     *
     * @return string 
     */
    public function getDns()
    {
        return $this->dns;
    }

    /**
     * Set serverdomain
     *
     * @param \AppBundle\Entity\Serverdomain $serverdomain
     * @return Domaindns
     */
    public function setServerdomain(\AppBundle\Entity\Serverdomain $serverdomain = null)
    {
        $this->serverdomain = $serverdomain;

        return $this;
    }

    /**
     * Get serverdomain
     *
     * @return \AppBundle\Entity\Serverdomain 
     */
    public function getServerdomain()
    {
        return $this->serverdomain;
    }
}
