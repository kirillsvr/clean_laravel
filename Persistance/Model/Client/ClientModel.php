<?php

namespace Persistance\Model\Client;

use DateTime;
use Domain\Client\Entity\Client;
use Persistance\Entity\Client\ClientEntity;

class ClientModel
{
    /**
     * @param ClientEntity[] $clients
     * @return Client[]
     */
    public function fromDbToBusinessCollection(array $clients): array
    {
        $collection = [];

        foreach ($clients as $client) {
            $collection[] = new Client(
                $client->getId(),
                $client->getName(),
                $client->getLastname(),
                $client->getClientGroupId(),
                $client->getPhone(),
                $client->getBirthdate(),
                $client->getBalance(),
                $client->getBonusBalance(),
                $client->getClubId(),
                $client->getCreatedAt()
            );
        }

        return $collection;
    }

    public function fromBusinessToDb(Client $client): ClientEntity
    {
        return new ClientEntity(
            $client->getId(),
            $client->getName(),
            $client->getLastname(),
            $client->getClientGroupId(),
            $client->getPhone(),
            $client->getBirthdate(),
            $client->getBalance(),
            $client->getBonusBalance(),
            $client->getClubId(),
            $client->getCreatedAt()
        );
    }
}