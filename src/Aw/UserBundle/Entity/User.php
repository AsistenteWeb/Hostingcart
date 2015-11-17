<?php

namespace Aw\UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;

class User extends BaseUser
{
    protected $firstname;
    protected $lastname;
    protected $company;
    protected $address1;
    protected $address2;
    protected $country;
    protected $state;
    protected $city;
    protected $zipcode;
    protected $phone;
    protected $corder;
    protected $resellerclubuser;
    protected $phonecc;

    public function __construct()
    {
        parent::__construct();
        $this->corder = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param mixed $firstname
     * @return $this
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param mixed $lastname
     * @return $this
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param mixed $company
     * @return $this
     */
    public function setCompany($company)
    {
        $this->company = $company;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAddress1()
    {
        return $this->address1;
    }

    /**
     * @param mixed $address1
     * @return $this
     */
    public function setAddress1($address1)
    {
        $this->address1 = $address1;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAddress2()
    {
        return $this->address2;
    }

    /**
     * @param mixed $address2
     * @return $this
     */
    public function setAddress2($address2)
    {
        $this->address2 = $address2;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param mixed $country
     * @return $this
     */
    public function setCountry($country)
    {
        $this->country = $country;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     * @return $this
     */
    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param mixed $state
     * @return $this
     */
    public function setState($state)
    {
        $this->state = $state;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getZipcode()
    {
        return $this->zipcode;
    }

    /**
     * @param mixed $zipcode
     * @return $this
     */
    public function setZipcode($zipcode)
    {
        $this->zipcode = $zipcode;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     * @return $this
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * Add corderdomain
     *
     * @param \AppBundle\Entity\Corder $corder
     * @return $this
     */
    public function addCorder(\AppBundle\Entity\Corder $corder)
    {
        $this->corder[] = $corder;

        return $this;
    }

    /**
     * Remove corder
     *
     * @param \AppBundle\Entity\Corder $corder
     */
    public function removeCorder(\AppBundle\Entity\Corder $corder)
    {
        $this->corder->removeElement($corder);
    }

    /**
     * Get corderdomain
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCorder()
    {
        return $this->corder;
    }

    /**
     * Set resellerclubuser
     *
     * @param \AppBundle\Entity\Resellerclubuser $resellerclubuser
     * @return User
     */
    public function setResellerclubuser(\AppBundle\Entity\Resellerclubuser $resellerclubuser = null)
    {
        $this->resellerclubuser = $resellerclubuser;

        return $this;
    }

    /**
     * Get resellerclubuser
     *
     * @return \AppBundle\Entity\Resellerclubuser
     */
    public function getResellerclubuser()
    {
        return $this->resellerclubuser;
    }

    /**
     * Set phonecc
     *
     * @param string $phonecc
     * @return User
     */
    public function setPhonecc($phonecc)
    {
        $this->phonecc = $phonecc;

        return $this;
    }

    /**
     * Get phonecc
     *
     * @return string 
     */
    public function getPhonecc()
    {
        return $this->phonecc;
    }
}
