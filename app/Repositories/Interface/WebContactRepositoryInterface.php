<?php

namespace App\Repositories\Interface;

interface WebContactRepositoryInterface
{
    public function getWebContact();
    public function createOrUpdate(array $data);
}
