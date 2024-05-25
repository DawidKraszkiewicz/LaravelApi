<?php
declare(strict_types=1);
namespace App\Repositories\User;
use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface {
    public function all(): \Illuminate\Database\Eloquent\Collection {
        return User::all();
    }

    public function create(array $data): User
    {
        return User::create($data);
    }

    public function update(array $data, int $id): User
    {
        $user = User::findOrFail($id);
        $user->update($data);
        return $user;
    }

    public function delete(int $id): void
    {
        $user = User::findOrFail($id);
        $user->delete();
    }

    public function find(int $id): User
    {
        return User::findOrFail($id);
    }

    public function findByEmail(string $email): User
    {
        return User::where('email', $email)->first();
    }
}
