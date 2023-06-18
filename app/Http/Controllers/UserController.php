<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use App\Services\User\Contracts\UserServiceContract;
use App\Trait\Log;

class UserController extends Controller
{
    use Log;

    public function __construct(
        protected UserServiceContract $userService
    ) {
    }

    public function search()
    {
        return view('user.search');
    }

    public function profile()
    {
        $authUser = $this->userService->getById(auth()->user()->id);
        return view('user.profile', [
            'user' => $authUser
        ]);
    }

    public function update(UserUpdateRequest $request, int $id)
    {
        try {
            if ($id !== auth()->user()->id) {
                throw new \Exception('Auth user can\'t update other user');
            }
            $this->userService->update($id, $request->all());
            return redirect(route('user.profile'))->with('positive-status', 'User successfully updated');
        } catch (\Exception $e) {
            $this->logError('controller.UserController.update', $e);
            return redirect(route('user.profile'))->with('negative-status', 'Could not update user, please try again');
        }
    }
}
