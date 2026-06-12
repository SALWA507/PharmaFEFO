<?php

class User
{
    private int $id;
    private string $name;
    private string $email;
    private string $password;
    private string $role;

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getRole(): string
    {
        return $this->role;
    }
}