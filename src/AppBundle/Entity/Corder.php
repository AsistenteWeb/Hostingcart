<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Corder
 */
class Corder
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $begindate;

    /**
     * @var \DateTime
     */
    private $enddate;

    /**
     * @var boolean
     */
    private $autorenew;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \AppBundle\Entity\Payment
     */
    private $payment;

    /**
     * @var \AppBundle\Entity\Corderhosting
     */
    private $corderhosting;

    /**
     * @var \AppBundle\Entity\Corderdomain
     */
    private $corderdomain;

    /**
     * @var \Aw\UserBundle\Entity\User
     */
    private $user;


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
     * Set begindate
     *
     * @param \DateTime $begindate
     * @return Corder
     */
    public function setBegindate($begindate)
    {
        $this->begindate = $begindate;

        return $this;
    }

    /**
     * Get begindate
     *
     * @return \DateTime 
     */
    public function getBegindate()
    {
        return $this->begindate;
    }

    /**
     * Set enddate
     *
     * @param \DateTime $enddate
     * @return Corder
     */
    public function setEnddate($enddate)
    {
        $this->enddate = $enddate;

        return $this;
    }

    /**
     * Get enddate
     *
     * @return \DateTime 
     */
    public function getEnddate()
    {
        return $this->enddate;
    }

    /**
     * Set autorenew
     *
     * @param boolean $autorenew
     * @return Corder
     */
    public function setAutorenew($autorenew)
    {
        $this->autorenew = $autorenew;

        return $this;
    }

    /**
     * Get autorenew
     *
     * @return boolean 
     */
    public function getAutorenew()
    {
        return $this->autorenew;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Corder
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set payment
     *
     * @param \AppBundle\Entity\Payment $payment
     * @return Corder
     */
    public function setPayment(\AppBundle\Entity\Payment $payment = null)
    {
        $this->payment = $payment;

        return $this;
    }

    /**
     * Get payment
     *
     * @return \AppBundle\Entity\Payment 
     */
    public function getPayment()
    {
        return $this->payment;
    }

    /**
     * Set corderhosting
     *
     * @param \AppBundle\Entity\Corderhosting $corderhosting
     * @return Corder
     */
    public function setCorderhosting(\AppBundle\Entity\Corderhosting $corderhosting = null)
    {
        $this->corderhosting = $corderhosting;

        return $this;
    }

    /**
     * Get corderhosting
     *
     * @return \AppBundle\Entity\Corderhosting 
     */
    public function getCorderhosting()
    {
        return $this->corderhosting;
    }

    /**
     * Set corderdomain
     *
     * @param \AppBundle\Entity\Corderdomain $corderdomain
     * @return Corder
     */
    public function setCorderdomain(\AppBundle\Entity\Corderdomain $corderdomain = null)
    {
        $this->corderdomain = $corderdomain;

        return $this;
    }

    /**
     * Get corderdomain
     *
     * @return \AppBundle\Entity\Corderdomain 
     */
    public function getCorderdomain()
    {
        return $this->corderdomain;
    }

    /**
     * Set user
     *
     * @param \Aw\UserBundle\Entity\User $user
     * @return Corder
     */
    public function setUser(\Aw\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Aw\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
    /**
     * @ORM\PrePersist
     */
    public function createdAt()
    {
        // Add your code here
    }
}
