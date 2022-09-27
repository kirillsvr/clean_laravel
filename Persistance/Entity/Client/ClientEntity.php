<?php

namespace Persistance\Entity\Client;

use DateTime;

class ClientEntity
{
    public function __construct(
        private readonly ?int      $id,
        private readonly string    $name,
        private readonly string    $lastname,
        private readonly ?int      $clientGroupId,
        private readonly int       $phone,
        private readonly ?DateTime $birthdate,
        private readonly ?float    $balance,
        private readonly ?float    $bonusBalance,
        private readonly int       $clubId,
        private readonly ?DateTime   $createdAt
    ) {}

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getLastname(): string
    {
        return $this->lastname;
    }

    public function getClientGroupId(): ?int
    {
        return $this->clientGroupId;
    }

    public function getPhone(): int
    {
        return $this->phone;
    }

    public function getBirthdate(): ?DateTime
    {
        return $this->birthdate;
    }

    public function getBalance(): ?float
    {
        return $this->balance;
    }

    public function getBonusBalance(): ?float
    {
        return $this->bonusBalance;
    }

    public function getClubId(): int
    {
        return $this->clubId;
    }

    public function getCreatedAt(): ?DateTime
    {
        return $this->createdAt;
    }
}