<?php

namespace App\Http\Model\Client;

use App\Http\Model\ClientGroup\ClientGroupModel;
use DateTime;
use Domain\Client\Entity\Client;

class ClientModel
{
    public function __construct(
        private readonly ClientGroupModel $clientGroupModel
    ) {}

    public function fromRequestToDomain(
        string $name,
        string $lastname,
        int $phone,
        string $birthday,
        int $clubId
    ): Client {
        $clientGroup = $this->clientGroupModel->getFirstClientGroupIdByClubId($clubId);

        return new Client(
            null,
            $name,
            $lastname,
            $clientGroup,
            $phone,
            new DateTime($birthday),
            null,
            null,
            $clubId,
            null
        );
    }
}
