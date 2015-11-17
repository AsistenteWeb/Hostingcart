<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dnsdefault
 */
class Dnsdefault
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
     * @return Dnsdefault
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

    public function __toString()
    {
        return (string) $this->dns;
    }
}
