<?php

namespace App\Services;

use App\Exceptions\BadRequest;
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

    public function __construct(string $email, string $password, ?string $firstName = null, ?string $lastName = null, ?array $profilePic = null)
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

    public function login(): void
    {
        if (empty($this->user)) {
            Validation::login($this->email);

            $this->user = $this->checkEmailExists();

            if (empty($this->user)) {
                throw new BadRequest("Email or Password is invalid");
            }

            Hash::verify($this->user["password"], $this->password);
        }

        unset($this->user["password"]);

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
