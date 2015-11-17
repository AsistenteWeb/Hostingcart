<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Paymentdetail
 */
class Paymentdetail
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $Description;

    /**
     * @var integer
     */
    private $corderproduct_id;

    /**
     * @var string
     */
    private $price;

    /**
     * @var integer
     */
    private $tax;

    /**
     * @var \AppBundle\Entity\Payment
     */
    private $payment;


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
     * Set Description
     *
     * @param string $description
     * @return Paymentdetail
     */
    public function setDescription($description)
    {
        $this->Description = $description;

        return $this;
    }

    /**
     * Get Description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->Description;
    }

    /**
     * Set corderproduct_id
     *
     * @param integer $corderproductId
     * @return Paymentdetail
     */
    public function setCorderproductId($corderproductId)
    {
        $this->corderproduct_id = $corderproductId;

        return $this;
    }

    /**
     * Get corderproduct_id
     *
     * @return integer 
     */
    public function getCorderproductId()
    {
        return $this->corderproduct_id;
    }

    /**
     * Set price
     *
     * @param string $price
     * @return Paymentdetail
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
     * Set tax
     *
     * @param integer $tax
     * @return Paymentdetail
     */
    public function setTax($tax)
    {
        $this->tax = $tax;

        return $this;
    }

    /**
     * Get tax
     *
     * @return integer 
     */
    public function getTax()
    {
        return $this->tax;
    }

    /**
     * Set payment
     *
     * @param \AppBundle\Entity\Payment $payment
     * @return Paymentdetail
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
}
