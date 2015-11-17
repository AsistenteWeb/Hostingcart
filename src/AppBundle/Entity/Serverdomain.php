<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Serverdomain
 */
class Serverdomain
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
     * @var \DateTime
     */
    private $begin;

    /**
     * @var \DateTime
     */
    private $expired;

    /**
     * @var string
     */
    private $status;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $domaincontact;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $domaindns;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->domaincontact = new \Doctrine\Common\Collections\ArrayCollection();
        $this->domaindns = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set domain
     *
     * @param string $domain
     * @return Serverdomain
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
     * Set begin
     *
     * @param \DateTime $begin
     * @return Serverdomain
     */
    public function setBegin($begin)
    {
        $this->begin = $begin;

        return $this;
    }

    /**
     * Get begin
     *
     * @return \DateTime 
     */
    public function getBegin()
    {
        return $this->begin;
    }

    /**
     * Set expired
     *
     * @param \DateTime $expired
     * @return Serverdomain
     */
    public function setExpired($expired)
    {
        $this->expired = $expired;

        return $this;
    }

    /**
     * Get expired
     *
     * @return \DateTime 
     */
    public function getExpired()
    {
        return $this->expired;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return Serverdomain
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Add domaincontact
     *
     * @param \AppBundle\Entity\Domaincontact $domaincontact
     * @return Serverdomain
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

    /**
     * Add domaindns
     *
     * @param \AppBundle\Entity\Domaindns $domaindns
     * @return Serverdomain
     */
    public function addDomaindn(\AppBundle\Entity\Domaindns $domaindns)
    {
        $this->domaindns[] = $domaindns;

        return $this;
    }

    /**
     * Remove domaindns
     *
     * @param \AppBundle\Entity\Domaindns $domaindns
     */
    public function removeDomaindn(\AppBundle\Entity\Domaindns $domaindns)
    {
        $this->domaindns->removeElement($domaindns);
    }

    /**
     * Get domaindns
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDomaindns()
    {
        return $this->domaindns;
    }
}
