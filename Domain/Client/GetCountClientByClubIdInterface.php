<?php

namespace Domain\Client;

interface GetCountClientByClubIdInterface
{
    public function get(int $clubId): int;
}