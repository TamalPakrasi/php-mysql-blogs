<?php

namespace App\Services;

use App\Models\Users;

use App\Services\Validation;
use App\Services\Upload;
use App\Services\Id;

use App\Exceptions\Conflict;

class Auth
{
    private ?string $firstName;
    private ?string $lastName;
    private string $email;
    private string $password;
    private ?array $profilePic;

    private $user = null;

    public function __construct(?string $firstName = null, ?string $lastName = null, string $email, string $password, ?array $profilePic)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->password = $password;
        $this->profilePic = $profilePic;
    }

    private function checkEmailExists(): ?array
    {
        return (new Users())->findByEmail($this->email);
    }

    private function create(string $hashedPass, string $secure_url)
    {
        $userId = Id::get();
        (new Users())->create($userId, $this->firstName, $this->lastName, $this->email, $hashedPass, $secure_url);
    }

    private function login(): void
    {
        session_regenerate_id();
        $_SESSION["user"] = $this->user;
        $_SESSION["isAuthenticated"] = true;
    }

    public function register(): void
    {
        Validation::registration($this->firstName, $this->lastName, $this->email, $this->password, $this->profilePic);

        $user = $this->checkEmailExists();

        if ($user) {
            throw new Conflict();
        }

        $hashedPass = Hash::hash($this->password);

        $secure_url = (new Upload())->upload($this->profilePic["tmp_name"], "profilePics");

        $this->user = $this->create($hashedPass, $secure_url);

        $this->login();
    }
}
