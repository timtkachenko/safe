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
        $this->messages = new ArrayCollection();

        $this->friendsWithMe = new \Doctrine\Common\Collections\ArrayCollection();
        $this->handshakes = new \Doctrine\Common\Collections\ArrayCollection();
    }
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\Column(type="string")
     */
    protected $slug;
    /**
     * @ORM\OneToMany(targetEntity="Whisper", mappedBy="user")
     */
    protected $whispers;
    /**
     * @ORM\OneToMany(targetEntity="Message", mappedBy="user")
     */
    protected $messages;
    /**
     * @ORM\OneToMany(targetEntity="Handshake", mappedBy="user")
     */
    protected $handshakes;
    /**
     * @ORM\OneToMany(targetEntity="Handshake", mappedBy="friend")
     */
    protected $friendsWithMe;
    /**
     * Get id
     * @return integer $id
     */
    public function getId()
    {
        return $this->id;
    }
    public function getWhispers() {
        return $this->whispers;
    }

    public function setWhispers(Whisper $whisper) {
        $this->whispers[] = $whisper;
    }
    public function getMessages() {
        return $this->messages;
    }

    public function setMessages(Message $message) {
        $this->messages = $messages;
    }

    public function getHandshakes() {
        return $this->handshakes;
    }

    public function setHandshakes(Handshake $handshake) {
        $this->handshakes[] = $handshake;
    }

    public function getFriendsWithMe() {
        return $this->friendsWithMe;
    }

    public function setFriendsWithMe(Handshake $friend) {
        $this->friendsWithMe[] = $friend;
    }



}