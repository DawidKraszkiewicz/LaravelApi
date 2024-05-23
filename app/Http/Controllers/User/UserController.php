<?php
declare(strict_types=1);
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserUpdateRequest;
use App\Services\User\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller {
    protected UserService $userService;
    public function __construct(UserService $userService){
        $this->userService = $userService;
    }
    public function index(): View {
        $users = $this->userService->all();
        return view('users.index', compact('users'));
    }
    public function create(): View {
        return view('users.create');
    }
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|confirmed'
        ]);

        $user = $this->userService->create($data);

        return redirect()->route('users.show', $user->id);
    }
    public function show(int $id): View {
        $user = $this->userService->find($id);
        return view('users.show', compact('user'));
    }

    public function edit(int $id){
        $user = $this->userService->find($id);
        return view('users.edit', compact('user'));
    }
    public function update(UserUpdateRequest $request, int $id): RedirectResponse
    {
        $data = $request->validated();

        $user = $this->userService->update($data, $id);

        return redirect()->route('users.show', $user->id);
    }
    public function destroy(int $id): RedirectResponse
    {
        $this->userService->delete($id);

        return redirect()->route('users.index');
    }
}
