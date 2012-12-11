<?php

/**
 * This file is part of the <name> project.
 *
 * (c) <yourname> <youremail>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Application\Sonata\UserBundle\Entity;

use Sonata\UserBundle\Entity\BaseUser as BaseUser;

class User extends BaseUser
{
    public function __construct() {
        parent::__construct();
//        $this->whispers = new ArrayCollection();
    }
    /**
     * @var integer $id
     */
    protected $id;

//    /**
//     */
//    protected $whispers;

    /**
     * Get id
     *
     * @return integer $id
     */
    public function getId()
    {
        return $this->id;
    }
//    public function getWhispers() {
//        return $this->whispers;
//    }
//
//    public function setWhispers(\NXC\SafeBundle\Entity\Whisper $whisper) {
//        $this->whispers[] = $whisper;
//    }


}