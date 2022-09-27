<?php

namespace Persistance\Repository;

use DateTime;
use Illuminate\Support\Facades\DB;
use Persistance\Entity\Client\ClientEntity;

class ClientRepository
{
    public const TABLE_CLIENT = 'client';

    public function getCountClientByClubId($clubId): ?int
    {
        return DB::table(self::TABLE_CLIENT)->where('club_id', $clubId)->count();
    }

    public function getClientById(int $clientId): ?ClientEntity
    {
        $client = DB::table(self::TABLE_CLIENT)
            ->where('id', $clientId)
            ->first();

        return ! empty($client)
            ? $this->makeClientEntity(
                json_decode(json_encode($client), true)
            )
            : null;
    }

    public function getClientIdByClubIdAndPhone(int $clubId, int $phone): ?int
    {
        $client = DB::table(self::TABLE_CLIENT)
            ->where('phone', $phone)
            ->where('club_id', $clubId)
            ->first();

        return $client->id ?? null;
    }

    /**
     * @param int $clubId
     * @param int|null $page
     * @param int|null $count
     * @return ClientEntity[]|null
     */
    public function getClientsByClubId(int $clubId, ?int $page = 1, ?int $count = 25): ?array
    {
        $clients = DB::table(self::TABLE_CLIENT)
            ->where('club_id', $clubId)
            ->offset(($page - 1) * $count)
            ->limit($count)
            ->get()
            ->toArray();

        return ! empty($clients)
            ? $this->makeClientEntityCollection(
                json_decode(json_encode($clients), true)
            )
            : null;
    }

    public function addClient(ClientEntity $clientEntity): void
    {
        DB::table(self::TABLE_CLIENT)
            ->insert([
                    "name" => $clientEntity->getName(),
                    "lastname" => $clientEntity->getLastname(),
                    "client_group_id" => $clientEntity->getClientGroupId(),
                    "phone" => $clientEntity->getPhone(),
                    "birthdate" => $clientEntity->getBirthdate(),
                    "club_id" => $clientEntity->getClubId()
            ]);
    }

    private function makeClientEntityCollection(array $clients): array
    {
        $collection = [];

        foreach ($clients as $client) {
            $collection[] = $this->makeClientEntity($client);
        }

        return $collection;
    }

    private function makeClientEntity(array $client): ClientEntity
    {
        return new ClientEntity(
            $client['id'],
            $client['name'],
            $client['lastname'],
            $client['client_group_id'],
            $client['phone'],
            new DateTime($client['birthdate']),
            $client['balance'],
            $client['bonus_balance'],
            $client['club_id'],
            new DateTime($client['created_at'])
        );
    }
}