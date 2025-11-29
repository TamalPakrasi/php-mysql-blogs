<?php

namespace App\Models;

use App\Core\Model;

class Users extends Model
{
  public function findByEmail(string $email): ?array
  {
    $this->sql = "SELECT `id`, `userId`, `first_name`, `last_name`, `email`, `profile_pic_url`, `joined_at` FROM `users` WHERE `email` = ?";

    parent::prepare();

    $this->stmt->bind_param("s", $email);

    parent::exec();

    $res = $this->stmt->get_result();
    $user = $res->fetch_assoc();

    parent::close();

    return $user ?: null;
  }

  public function create(string $userId, string $firstName, string $lastName, string $email, string $pass, string $profilePicUrl): array
  {
    $this->sql = "INSERT INTO `users` (`userId`, `first_name`, `last_name`, `email`, `password`, `profile_pic_url`) VALUES (?,?,?,?,?,?)";

    parent::prepare();

    $this->stmt->bind_param("ssssss", $userId, $firstName, $lastName, $email, $pass, $profilePicUrl);

    parent::exec();

    $insertId = $this->stmt->insert_id;
    parent::close();

    return [
      "id" => $insertId,
      "userId" => $userId,
      "first_name" => $firstName,
      "last_name" => $lastName,
      "email" => $email,
      "profile_pic_url" => $profilePicUrl,
      "joined_at" => date("Y-m-d")
    ];
  }
}
