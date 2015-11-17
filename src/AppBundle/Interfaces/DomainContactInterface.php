<?php

namespace AppBundle\Interfaces;

interface DomainContactInterface
{
	public function getId();
	public function getName();
	public function getCompany();
	public function getEmail();
	public function getAddressLine1();
	public function getAddressLine2();
	public function getCity();
	public function getCountry();
	public function getZipcode();
	public function getPhoneCc();
	public function getPhone();
}