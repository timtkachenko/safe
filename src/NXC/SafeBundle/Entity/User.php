<?php

/**
 * This file is part of the <name> project.
 *
 * (c) <yourname> <youremail>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NXC\SafeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Application\Sonata\UserBundle\Entity\User as BaseUser;
/**
 * @ORM\Entity
 * @ORM\Table(name="nxcuser")
 */
class User extends BaseUser
{
    public function __construct() {
        parent::__construct();
        $this->whispers = new ArrayCollection();
    }
    /**
     * @var integer $id
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="Whisper", mappedBy="user")
     */
    protected $whispers;

    /**
     * Get id
     *
     * @return integer $id
     */
    public function getId()
    {
        return $this->id;
    }
    public function getWhispers() {
        return $this->whispers;
    }

    public function setWhispers(\NXC\SafeBundle\Entity\Whisper $whisper) {
        $this->whispers[] = $whisper;
    }


}