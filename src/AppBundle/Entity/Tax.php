<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tax
 */
class Tax
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $percent;


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
     * Set percent
     *
     * @param integer $percent
     * @return Tax
     */
    public function setPercent($percent)
    {
        $this->percent = $percent;

        return $this;
    }

    /**
     * Get percent
     *
     * @return integer 
     */
    public function getPercent()
    {
        return $this->percent;
    }
}
