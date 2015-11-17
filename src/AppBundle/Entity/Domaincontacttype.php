<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Domaincontacttype
 */
class Domaincontacttype
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $domaincontact;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->domaincontact = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return Domaincontacttype
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add domaincontact
     *
     * @param \AppBundle\Entity\Domaincontact $domaincontact
     * @return Domaincontacttype
     */
    public function addDomaincontact(\AppBundle\Entity\Domaincontact $domaincontact)
    {
        $this->domaincontact[] = $domaincontact;

        return $this;
    }

    /**
     * Remove domaincontact
     *
     * @param \AppBundle\Entity\Domaincontact $domaincontact
     */
    public function removeDomaincontact(\AppBundle\Entity\Domaincontact $domaincontact)
    {
        $this->domaincontact->removeElement($domaincontact);
    }

    /**
     * Get domaincontact
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDomaincontact()
    {
        return $this->domaincontact;
    }
}
