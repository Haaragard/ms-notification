<?php

declare(strict_types=1);

namespace App\Domain\User\Entity;

use App\Domain\_Shared\Entity;
use InvalidArgumentException;

use function Hyperf\Config\config;

class UserEntity extends Entity
{
    private string $name;
    private string $email;
    private string $password;

    public function __construct(
        string $name,
        string $email,
        string $password
    ) {
        $this->setName($name);
        $this->setEmail($email);
        $this->setPassword($password);
    }

    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @throws InvalidArgumentException
     */
    public function setName(string $name): void
    {
        if (empty($name)) {
            throw new InvalidArgumentException('Name is required');
        }

        $this->name = $name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @throws InvalidArgumentException
     */
    public function setEmail(string $email): void
    {
        if (empty($email)) {
            throw new InvalidArgumentException('Email is required');
        }

        $this->email = $email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @throws InvalidArgumentException
     */
    public function setPassword(string $password): void
    {
        if (empty($password)) {
            throw new InvalidArgumentException('Password is required');
        }

        $this->password = password_hash(
            $password,
            config('passwords.algo'),
            ['cost' => config('passwords.cost')]
        );
    }

    public function passwordVerify(string $password): bool
    {
        return password_verify($password, $this->password);
    }
}