<?php

namespace AppBundle\Entity;


use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\Role\Role;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 * @UniqueEntity(fields={"email"}, message="It looks like your already have an account!")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\NotBlank()
     * @Assert\Email()
     * @ORM\Column(type="string", unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * A non-persisted field that's used to create the encoded password.
     * @Assert\NotBlank(groups={"Registration"})
     */
    private $plainPassword;

    /**
     * @ORM\Column(type="json_array")
     */
    private $roles = [];

    /**
     * @ORM\Column(type="json_array")
     */
    private $savedWords = [];

    public function getSavedWords()
    {
        return $this->savedWords;
    }

    public function setSavedWords($savedWords)
    {
        $this->savedWords = $savedWords;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
    
    public function getUsername()
    {
        return $this->email;
    }

    public function getRoles()
    {
        $roles = $this->roles;
        if (!in_array('ROLE_USER', $roles)) {
            $roles[] = 'ROLE_USER';
        }

        return $roles;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getSalt()
    {
    }

    public function eraseCredentials()
    {
        $this->plainPassword = null;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    public function setPlainPassword($plainPassword)
    {
        $this->plainPassword = $plainPassword;
        $this->password = null;
    }

    public function setRoles($roles)
    {
        $this->roles = $roles;
    }
}