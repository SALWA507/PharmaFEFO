<?php

class Product
{
    private int $id;
    private string $name;
    private string $code;
    private string $description;

    public function getId(): int { return $this->id; }
    public function getName(): string { return $this->name; }
}