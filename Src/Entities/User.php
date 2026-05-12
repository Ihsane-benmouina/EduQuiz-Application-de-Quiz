<?php

namespace Entities;

abstract class User
{
    private string $firstname;
    private String $lastname;
    private string $email;
    private string $password;

    public function __construct(string $firstname, string $lastname, string $email, string $password)
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->password = $password;
    }
}