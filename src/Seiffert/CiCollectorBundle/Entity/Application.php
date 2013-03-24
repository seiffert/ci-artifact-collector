<?php

namespace Seiffert\CiCollectorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity
 */
class Application implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string")
     *
     * @var string
     */
    private $name;

    /**
     * @ORM\Column(type="string")
     *
     * @var string
     */
    private $token;

    public function __construct()
    {
        $this->token = md5('token_' . microtime());
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string[] The user roles
     */
    public function getRoles()
    {
        return array('ROLE_APPLICATION');
    }

    /**
     * @return string The application token
     */
    public function getPassword()
    {
        return $this->token;
    }

    /**
     * @return string The salt
     */
    public function getSalt()
    {
        return null;
    }

    /**
     * @return string The username
     */
    public function getUsername()
    {
        return $this->name;
    }

    /**
     * @return void
     */
    public function eraseCredentials()
    {
        $this->token = null;
    }
}
