<?php

namespace App\Http\Livewire;

use App\Enum\User\UserParamsSearch;
use App\Enum\UserType;
use App\Services\User\Contracts\UserSearchServiceContract;
use App\Services\User\Contracts\UserServiceContract;
use App\Trait\Log;
use Livewire\Component;

class UserSearch extends Component
{
    use Log;

    // These properties must be identical to params setted at $queryString
    public $name;
    public $email;
    public $birth_date;
    public $country;
    public $city;
    public $user_type;
    public $fullSearch;

    public $toggleCollapse = false;

    private UserServiceContract $userService;
    private UserSearchServiceContract $userSearchService;

    protected $queryString = [
        UserParamsSearch::NAME_PARAM,
        UserParamsSearch::EMAIL_PARAM,
        UserParamsSearch::BIRTH_DATE_PARAM,
        UserParamsSearch::COUNTRY_PARAM,
        UserParamsSearch::CITY_PARAM,
        UserParamsSearch::USER_TYPE_PARAM,
    ];

    public function __construct()
    {
        $this->userService = app(UserServiceContract::class);
        $this->userSearchService = app(UserSearchServiceContract::class);
    }

    public function render()
    {
        $search = $this->setParamsToFilter();
        if (empty($search)) {
            $contacts = $this->userService->getAll();
        } else {
            $contacts = $this->userSearchService->getByCustomQuery($search);
        }
        return view('livewire.user.search', [
            'rolesAvailable' => UserType::allUserTypes(),
            'contacts' => $contacts
        ]);
    }

    private function setParamsToFilter(): array
    {
        $userSearch = [];
        foreach (get_object_vars($this) as $key => $value) {
            if (in_array($key, $this->queryString) && !is_null($value) && $value !== "") {
                $userSearch[] = [
                    $key => $value
                ];
            }
        }
        return array_merge(...$userSearch);
    }
}
