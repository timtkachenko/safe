<?php

namespace NXC\SafeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Handshake
 *
 * @ORM\Table(name="handshake")
 * @ORM\Entity(repositoryClass="NXC\SafeBundle\Entity\HandshakeRepository")
 */
class Handshake
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="handshakes", fetch="EAGER")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;
    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="friendsWithMe", fetch="EAGER")
     * @ORM\JoinColumn(name="friend_user_id", referencedColumnName="id")
     */
    protected $friend;

    /**
     *  @ORM\Column(type="string", length=32, unique=true, nullable=false)
     */
    protected $power;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
    public function getUser() {
        return $this->user;
    }

    public function setUser(User $user) {
        $this->user = $user;
    }

    public function getFriend() {
        return $this->friend;
    }

    public function setFriend(User $friend) {
        $this->friend = $friend;
    }

    public function getPower() {
        return $this->power;
    }

    public function setPower($power) {
        $this->power = $power;
    }



}
