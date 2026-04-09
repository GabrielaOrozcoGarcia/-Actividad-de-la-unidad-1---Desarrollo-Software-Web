<?php

namespace Infrastructure\Persistence\MySQL;

use Application\Ports\Out\DeleteUserPort;
use Application\Ports\Out\GetAllUsersPort;
use Application\Ports\Out\GetUserByEmailPort;
use Application\Ports\Out\GetUserByIdPort;
use Application\Ports\Out\SaveUserPort;
use Application\Ports\Out\UpdateUserPort;
use Domain\Models\UserModel;
use Infrastructure\Persistence\Mappers\UserPersistenceMapper;
use PDO;

class UserRepositoryMySQL implements
    SaveUserPort,
    UpdateUserPort,
    DeleteUserPort,
    GetUserByIdPort,
    GetUserByEmailPort,
    GetAllUsersPort
{
    private PDO $pdo;
    private UserPersistenceMapper $mapper;

    public function __construct()
    {
        $this->pdo    = DatabaseConnection::getInstance();
        $this->mapper = new UserPersistenceMapper();
    }

    public function save(UserModel $user): UserModel
    {
        $row  = $this->mapper->toRow($user);
        $stmt = $this->pdo->prepare('
            INSERT INTO users (id, name, email, password, role_id, status)
            VALUES (:id, :name, :email, :password, :role_id, :status)
        ');
        $stmt->execute($row);
        return $user;
    }

    public function update(UserModel $user): UserModel
    {
        $row  = $this->mapper->toRow($user);
        $stmt = $this->pdo->prepare('
            UPDATE users
            SET name = :name,
                email = :email,
                password = :password,
                role_id = :role_id,
                status = :status
            WHERE id = :id
        ');
        $stmt->execute($row);
        return $user;
    }

    public function delete(string $id): void
    {
        $stmt = $this->pdo->prepare('DELETE FROM users WHERE id = :id');
        $stmt->execute(['id' => $id]);
    }

    public function findById(string $id): ?UserModel
    {
        $stmt = $this->pdo->prepare('SELECT * FROM users WHERE id = :id');
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch();
        return $row ? $this->mapper->toModel($row) : null;
    }

    public function findByEmail(string $email): ?UserModel
    {
        $stmt = $this->pdo->prepare('SELECT * FROM users WHERE email = :email');
        $stmt->execute(['email' => $email]);
        $row = $stmt->fetch();
        return $row ? $this->mapper->toModel($row) : null;
    }

    public function findAll(): array
    {
        $stmt = $this->pdo->query('SELECT * FROM users ORDER BY name ASC');
        $rows = $stmt->fetchAll();
        return array_map(fn($row) => $this->mapper->toModel($row), $rows);
    }
}
