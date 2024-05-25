<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserLoginRequest;
use App\Services\User\UserAuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class AuthController extends Controller
{
    protected UserAuthService $authService;

    public function __construct(UserAuthService $authService)
    {
        $this->authService = $authService;
    }

    public function showLoginForm() : View
    {
        return view('auth.login');
    }

    public function login(UserLoginRequest $request) : \Illuminate\Http\RedirectResponse
    {
        try {
            $this->authService->login($request->validated());
            return redirect()->route('users.index');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors());
        }
    }

    public function logout(Request $request) : \Illuminate\Http\RedirectResponse
    {
        Auth::logout();

        return redirect()->route('auth.login');
    }
}
