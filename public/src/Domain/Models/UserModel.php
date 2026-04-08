<?php

namespace Domain\Models;

use Domain\Enums\UserRole;
use Domain\Enums\UserStatus;
use Domain\ValueObjects\UserEmail;
use Domain\ValueObjects\UserId;
use Domain\ValueObjects\UserName;
use Domain\ValueObjects\UserPassword;

class UserModel
{
    public function __construct(
        private UserId       $id,
        private UserName     $name,
        private UserEmail    $email,
        private UserPassword $password,
        private UserRole     $role,
        private UserStatus   $status
    ) {}

    public function id(): UserId
    {
        return $this->id;
    }
    public function name(): UserName
    {
        return $this->name;
    }
    public function email(): UserEmail
    {
        return $this->email;
    }
    public function password(): UserPassword
    {
        return $this->password;
    }
    public function role(): UserRole
    {
        return $this->role;
    }
    public function status(): UserStatus
    {
        return $this->status;
    }
}
