<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Payment
 */
class Payment
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var array
     */
    private $paymentinfo;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $paymentdetail;

    /**
     * @var \AppBundle\Entity\Paymentmethod
     */
    private $paymentmethod;

    /**
     * @var \AppBundle\Entity\Paymentstatus
     */
    private $paymentstatus;

    /**
     * @var \AppBundle\Entity\Corder
     */
    private $corder;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->paymentdetail = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set paymentinfo
     *
     * @param array $paymentinfo
     * @return Payment
     */
    public function setPaymentinfo($paymentinfo)
    {
        $this->paymentinfo = $paymentinfo;

        return $this;
    }

    /**
     * Get paymentinfo
     *
     * @return array 
     */
    public function getPaymentinfo()
    {
        return $this->paymentinfo;
    }

    /**
     * Add paymentdetail
     *
     * @param \AppBundle\Entity\Paymentdetail $paymentdetail
     * @return Payment
     */
    public function addPaymentdetail(\AppBundle\Entity\Paymentdetail $paymentdetail)
    {
        $this->paymentdetail[] = $paymentdetail;

        return $this;
    }

    /**
     * Remove paymentdetail
     *
     * @param \AppBundle\Entity\Paymentdetail $paymentdetail
     */
    public function removePaymentdetail(\AppBundle\Entity\Paymentdetail $paymentdetail)
    {
        $this->paymentdetail->removeElement($paymentdetail);
    }

    /**
     * Get paymentdetail
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPaymentdetail()
    {
        return $this->paymentdetail;
    }

    /**
     * Set paymentmethod
     *
     * @param \AppBundle\Entity\Paymentmethod $paymentmethod
     * @return Payment
     */
    public function setPaymentmethod(\AppBundle\Entity\Paymentmethod $paymentmethod = null)
    {
        $this->paymentmethod = $paymentmethod;

        return $this;
    }

    /**
     * Get paymentmethod
     *
     * @return \AppBundle\Entity\Paymentmethod 
     */
    public function getPaymentmethod()
    {
        return $this->paymentmethod;
    }
    
    /**
     * Set paymentstatus
     *
     * @param \AppBundle\Entity\Paymentstatus $paymentstatus
     * @return Payment
     */
    public function setPaymentstatus(\AppBundle\Entity\Paymentstatus $paymentstatus = null)
    {
        $this->paymentstatus = $paymentstatus;

        return $this;
    }

    /**
     * Get paymentstatus
     *
     * @return \AppBundle\Entity\Paymentstatus 
     */
    public function getPaymentstatus()
    {
        return $this->paymentstatus;
    }

    /**
     * Set corder
     *
     * @param \AppBundle\Entity\Corder $corder
     * @return Payment
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
