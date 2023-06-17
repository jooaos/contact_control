<?php

namespace App\Http\Controllers\Auth;

use App\Enum\UserType;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Services\User\Contracts\UserServiceContract;

class SignUpController extends Controller
{
    public function __construct(
        protected UserServiceContract $userService
    ) {
    }

    public function show()
    {
        return view('auth.signup');
    }

    public function handle()
    {
        $this->validate(request(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed'
        ]);
        $userInfo = array_merge(request([
            'name', 'email', 'password'
        ]), [
            'user_type_id' => UserType::ID_MEMBER
        ]);
        $user = $this->userService->create($userInfo);
        auth()->login($user);
        return redirect()->to(RouteServiceProvider::HOME);
    }
}
