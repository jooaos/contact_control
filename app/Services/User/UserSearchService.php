<?php

namespace App\Services\User;

use App\Repository\User\Contracts\UserRepositoryContract;
use App\Services\User\Contracts\UserSearchServiceContract;
use App\Trait\Log;
use App\Enum\User\UserParamsSearch;
use Illuminate\Database\Eloquent\Collection;

class UserSearchService implements UserSearchServiceContract
{
    use Log;

    public function __construct(
        protected UserRepositoryContract $userRepository
    ) {
    }

    public function getByCustomQuery(array $params): Collection
    {
        try {
            return $this->userRepository->getWithCustomQuery(
                $this->customQuery($params)
            );
        } catch (\Exception $e) {
            $this->logError('services.UserSearchService.getByCustomQuery', $e);
            throw $e;
        }
    }

    private function customQuery(array $queryParams): array
    {
        foreach ($queryParams as $key => $value) {
            if (!in_array($key, UserParamsSearch::getAvailableParams())) {
                throw new \Exception("Param: '{$key}' isn't accepted");
            }
            $paramDetails = UserParamsSearch::getDetailsFomParam($key);
            $query[] = [
                $paramDetails['database_field'],
                $paramDetails['operator'],
                $paramDetails['operator'] == UserParamsSearch::LIKE_OPERATOR ? "%$value%" : $value
            ];
        }
        return $query;
    }
}
