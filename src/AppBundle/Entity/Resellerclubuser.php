<?php

namespace AppBundle\Entity;

use Aw\UserBundle\Entity\User;
use Doctrine\ORM\Mapping as ORM;

/**
 * Resellerclubuser
 */
class Resellerclubuser
{
    private $id;
    private $code;
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
     * Set code
     *
     * @param string $code
     * @return Resellerclubuser
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set user
     *
     * @param \Aw\UserBundle\Entity\User $user
     * @return Resellerclubuser
     */
    public function setUser(User $user)
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
}
