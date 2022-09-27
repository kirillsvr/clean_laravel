<?php

namespace UseCase\Client;

use Domain\Client\GetCountClientByClubIdInterface;

class GetCountClientUseCase
{
    public function __construct(
        readonly private GetCountClientByClubIdInterface $getCountClientByClubId
    ) {}

    public function get(int $clubId): int
    {
        return $this->getCountClientByClubId->get($clubId);
    }
}