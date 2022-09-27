<?php

namespace Domain\Client;

use Domain\Client\Entity\Client;

interface GetClientsByClubIdInterface
{
    /**
     * @param int $clubId
     * @param int $page
     * @param int $count
     * @return Client[]
     */
    public function get(int $clubId, int $page, int $count): array;
}