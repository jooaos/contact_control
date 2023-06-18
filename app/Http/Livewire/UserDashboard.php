<?php

namespace App\Http\Livewire;

use App\Enum\User\UserParamsSearch;
use App\Enum\UserType;
use App\Services\User\Contracts\UserSearchServiceContract;
use App\Services\User\Contracts\UserServiceContract;
use App\Trait\Log;
use Livewire\Component;

class UserDashboard extends Component
{
    use Log;

    // These properties must be identical to params setted at $queryString
    public $name;
    public $email;

    private UserServiceContract $userService;
    private UserSearchServiceContract $userSearchService;

    protected $queryString = [
        UserParamsSearch::NAME_PARAM,
        UserParamsSearch::EMAIL_PARAM
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
        $countRoles = $this->countRoles($contacts->toArray());
        return view('livewire.user.dashboard', [
            'contacts' => $contacts,
            'countRoles' => $countRoles
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

    private function countRoles(array $contacts)
    {
        $superAdminCount = 0;
        $adminCount = 0;
        $memberCount = 0;
        foreach ($contacts as $contact) {
            switch ($contact['user_type_id']) {
                case UserType::ID_SUPER_ADMIN;
                    $superAdminCount++;
                    break;
                case UserType::ID_ADMIN;
                    $adminCount++;
                    break;
                case UserType::ID_MEMBER;
                    $memberCount++;
                    break;
            }
        }
        $countRoles = [
            'superAdmin' => $superAdminCount,
            'admin' => $adminCount,
            'member' => $memberCount
        ];
        $this->emit('chartDataUpdated', $countRoles);
        return $countRoles;
    }
}
