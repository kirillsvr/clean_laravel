<?php

namespace Persistance\Action\Client;

use Domain\Client\GetCountClientByClubIdInterface;
use Persistance\Repository\ClientRepository;

class GetCountClientByClubIdAction implements GetCountClientByClubIdInterface
{
    public function __construct(
        readonly private ClientRepository $clientRepository
    ) {}

    public function get(int $clubId): int
    {
        return $this->clientRepository->getCountClientByClubId($clubId) ?? 0;
    }
}