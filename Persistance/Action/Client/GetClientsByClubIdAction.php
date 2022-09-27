<?php

namespace Persistance\Action\Client;

use Domain\Client\Entity\Client;
use Domain\Client\GetClientsByClubIdInterface;
use Persistance\Model\Client\ClientModel;
use Persistance\Repository\ClientRepository;

class GetClientsByClubIdAction implements GetClientsByClubIdInterface
{
    public function __construct(
        readonly private ClientRepository $clientRepository,
        readonly private ClientModel $clientModel
    ) {}

    /**
     * @param int $clubId
     * @param int $page
     * @param int $count
     * @return Client[]
     */
    public function get(int $clubId, int $page, int $count): array
    {
        $clients = $this->clientRepository->getClientsByClubId($clubId, $page, $count);

        if (! $clients) {
            return [];
        }

        return $this->clientModel->fromDbToBusinessCollection($clients);
    }
}