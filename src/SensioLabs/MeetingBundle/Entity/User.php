<?php

namespace Sensiolabs\MeetingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use SensioLabs\Connect\Api\Entity\User as ConnectApiUser;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Table(name="sl_user")
 * @ORM\Entity(repositoryClass="Sensiolabs\MeetingBundle\Repository\UserRepository")
 */
class User implements UserInterface
{
    /** @ORM\Column(type="integer") @ORM\Id @ORM\GeneratedValue(strategy="AUTO") */
    private $id;

    /** @ORM\Column(type="string", length=255) */
    private $uuid;

    /** @ORM\Column(type="string", length=255) */
    private $username;

    /** @ORM\Column(type="string", length=255) */
    private $name;

    public function __construct($uuid)
    {
        $this->uuid = $uuid;
    }

    public function updateFromConnect(ConnectApiUser $apiUser)
    {
        $this->username = $apiUser->getUsername();
        $this->name = $apiUser->getName();
    }

    public function getUuid()
    {
        return $this->uuid;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getRoles()
    {
        return array('ROLE_USER');
    }

    public function getPassword()
    {
    }

    public function getSalt()
    {
    }

    public function eraseCredentials()
    {
    }
}
