<?php

namespace UseCase\Client;

use Domain\Client\GetClientsByClubIdInterface;

class GetClientsUseCase
{
    public function __construct(
      readonly private GetClientsByClubIdInterface $getClientsByClubId
    ) {}

    public function get(int $clubId, ?int $page = 1, ?int $count = 25): ?array
    {
        return $this->getClientsByClubId->get($clubId, $page, $count);
    }
}