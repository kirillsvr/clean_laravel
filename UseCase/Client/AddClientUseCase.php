<?php

namespace UseCase\Client;

use Domain\Client\AddClientInterface;
use Domain\Client\Entity\Client;

class AddClientUseCase
{
    public function __construct(
        private readonly AddClientInterface $addClient
    ) {}

    public function add(Client $client): void
    {
        $this->addClient->add($client);
    }
}