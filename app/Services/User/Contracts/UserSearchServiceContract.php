<?php

namespace App\Services\User\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface UserSearchServiceContract
{
    public function getByCustomQuery(array $params): Collection;
}
