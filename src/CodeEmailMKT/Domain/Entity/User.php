<?php

namespace CodeEmailMKT\Domain\Entity;

use Doctrine\ORM\Mapping as ORM;

class User
{
    private $id;
    private $name;
    private $email;
    private $password;
    private $plainPassword;

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    public function setPlainPassword($plainPassword){
        $this->plainPassword = $plainPassword;
        return $this;
    }

    public function generatePassword()
    {
        $password = $this->getPlainPassword()?? uniqid();
        $this->setPassword(password_hash($password,PASSWORD_BCRYPT));

        //ver se a gente atribuiu alguma senha - gera uma cript desta senha
        //senão gera uma senha aleatória - gera uma cript desta senha
    }


}
