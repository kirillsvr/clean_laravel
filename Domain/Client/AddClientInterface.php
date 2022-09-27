<?php

namespace Domain\Client;

use Domain\Client\Entity\Client;

interface AddClientInterface
{
    public function add(Client $client): void;
}