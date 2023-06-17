<?php

namespace App\Http\Controllers\Auth;

class LogoutController
{
    public function handle()
    {
        auth()->logout();
        return redirect()->route('signin.view');
    }
}
