<?php
namespace Services;

use App\Repositories\UserRepository;

class UserService {
    private UserRepository $repo;

    public function __construct(UserRepository $repo) {
        $this->repo = $repo;
    }

    public function register($firstname, $lastname, $email, $password, $labelRole) {
        if ($this->repo->getUserByEmail($email)) {
            return "email_exists";
        }

        $passwordHash = password_hash($password, PASSWORD_BCRYPT);

        $success = $this->repo->registerUser($firstname, $lastname, $email, $passwordHash, $labelRole);
        return $success ? "success" : "error";
    }

    public function login($email, $password) {
        $user = $this->repo->getUserByEmail($email);
        if (!$user) {
            return false;
        }
        if (password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }
}