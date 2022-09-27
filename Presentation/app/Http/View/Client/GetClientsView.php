<?php

namespace App\Http\View\Client;

use App\Http\Model\ClientGroup\ClientGroupModel;
use Domain\Client\Entity\Client;

class GetClientsView
{
    public const ID = 'id';
    public const NAME = 'name';
    public const LASTNAME = 'lastname';
    public const CLIENT_GROUP_ID = 'clientGroupId';
    public const PHONE = 'phone';
    public const BIRTHDATE = 'birthdate';
    public const BALANCE = 'balance';
    public const BONUS_BALANCE = 'bonusBalance';
    public const CREATED_AT = 'createdAt';

    public function __construct(
        private readonly ClientGroupModel $clientGroupModel
    ) {}

    /**
     * @param Client[] $clients
     * @return array
     */
    public function fromDomainToArray(array $clients): array
    {
        if (empty($clients)) {
            return [];
        }

        $clientGroups = $this->clientGroupModel->getClientGroupNameByIds(
            array_unique(
                array_map(
                    fn(Client $client): int => $client->getClientGroupId(),
                    $clients
                )
            )
        );

        $collection = [];

        foreach ($clients as $client) {
            $collection[] = [
                self::ID => $client->getId(),
                self::NAME => $client->getName(),
                self::LASTNAME => $client->getLastname(),
                self::CLIENT_GROUP_ID => $clientGroups[$client->getClientGroupId()],
                self::PHONE => $client->getPhone(),
                self::BIRTHDATE => $client->getBirthdate()->format(env('STANDARD_DATE_FORMAT')),
                self::BALANCE => $client->getBalance(),
                self::BONUS_BALANCE => $client->getBonusBalance(),
                self::CREATED_AT => $client->getCreatedAt()->format(env('STANDARD_DATE_FORMAT'))
            ];
        }

        return $collection;
    }
}
