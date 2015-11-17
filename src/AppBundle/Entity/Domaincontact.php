<?php

namespace AppBundle\Entity;

use AppBundle\Interfaces\DomainContactInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * Domaincontact
 */
class Domaincontact implements DomainContactInterface
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
     * @var string
     */
    private $company;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $address_line_1;

    /**
     * @var string
     */
    private $address_line_2;

    /**
     * @var string
     */
    private $city;

    /**
     * @var string
     */
    private $country;

    /**
     * @var string
     */
    private $zipcode;

    /**
     * @var string
     */
    private $phone_cc;

    /**
     * @var string
     */
    private $phone;

    /**
     * @var \AppBundle\Entity\Domaincontacttype
     */
    private $domaincontactype;

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
     * Set name
     *
     * @param string $name
     * @return Domaincontact
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
     * Set company
     *
     * @param string $company
     * @return Domaincontact
     */
    public function setCompany($company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return string 
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Domaincontact
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set address_line_1
     *
     * @param string $addressLine1
     * @return Domaincontact
     */
    public function setAddressLine1($addressLine1)
    {
        $this->address_line_1 = $addressLine1;

        return $this;
    }

    /**
     * Get address_line_1
     *
     * @return string 
     */
    public function getAddressLine1()
    {
        return $this->address_line_1;
    }

    /**
     * Set address_line_2
     *
     * @param string $addressLine2
     * @return Domaincontact
     */
    public function setAddressLine2($addressLine2)
    {
        $this->address_line_2 = $addressLine2;

        return $this;
    }

    /**
     * Get address_line_2
     *
     * @return string 
     */
    public function getAddressLine2()
    {
        return $this->address_line_2;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return Domaincontact
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set country
     *
     * @param string $country
     * @return Domaincontact
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string 
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set zipcode
     *
     * @param string $zipcode
     * @return Domaincontact
     */
    public function setZipcode($zipcode)
    {
        $this->zipcode = $zipcode;

        return $this;
    }

    /**
     * Get zipcode
     *
     * @return string 
     */
    public function getZipcode()
    {
        return $this->zipcode;
    }

    /**
     * Set phone_cc
     *
     * @param string $phoneCc
     * @return Domaincontact
     */
    public function setPhoneCc($phoneCc)
    {
        $this->phone_cc = $phoneCc;

        return $this;
    }

    /**
     * Get phone_cc
     *
     * @return string 
     */
    public function getPhoneCc()
    {
        return $this->phone_cc;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return Domaincontact
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set domaincontactype
     *
     * @param \AppBundle\Entity\Domaincontacttype $domaincontactype
     * @return Domaincontact
     */
    public function setDomaincontactype(\AppBundle\Entity\Domaincontacttype $domaincontactype = null)
    {
        $this->domaincontactype = $domaincontactype;

        return $this;
    }

    /**
     * Get domaincontactype
     *
     * @return \AppBundle\Entity\Domaincontacttype 
     */
    public function getDomaincontactype()
    {
        return $this->domaincontactype;
    }

    /**
     * Set serverdomain
     *
     * @param \AppBundle\Entity\Serverdomain $serverdomain
     * @return Domaincontact
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
