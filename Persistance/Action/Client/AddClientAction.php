<?php

namespace Persistance\Action\Client;

use Domain\Client\AddClientInterface;
use Domain\Client\Entity\Client;
use Exception;
use Persistance\Model\Client\ClientModel;
use Persistance\Repository\ClientRepository;

class AddClientAction implements AddClientInterface
{
    public function __construct(
        private readonly ClientRepository $clientRepository,
        private readonly ClientModel $clientModel
    ) {}

    public function add(Client $client): void
    {
        $clientId = $this->clientRepository->getClientIdByClubIdAndPhone(
            $client->getClubId(),
            $client->getPhone()
        );

        if ($clientId) {
            throw new Exception('Пользователь с таким телефоном уже существует');
        }

        $this->clientRepository->addClient(
            $this->clientModel->fromBusinessToDb($client)
        );
    }
}