<?php

namespace NXC\SafeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Handshake
 */
class Handshake
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $firstId;

    /**
     * @var string
     */
    private $secondId;

    /**
     * @var string
     */
    private $value;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    public function getFirstId() {
        return $this->firstId;
    }

    public function setFirstId($firstId) {
        $this->firstId = $firstId;
    }

    public function getSecondId() {
        return $this->secondId;
    }

    public function setSecondId($secondId) {
        $this->secondId = $secondId;
    }

    /**
     * Set value
     *
     * @param string $value
     * @return Handshake
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }
}
