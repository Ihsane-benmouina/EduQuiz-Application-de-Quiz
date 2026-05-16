<?php

class User {

    protected $firstname;
    protected $lastname;
    protected $email;
    protected $password;

    public function register() {
        echo "User registered";
    }

    public function login() {
        echo "User logged in";
    }

    public function logout() {
        echo "User logged out";
    }
}
?>