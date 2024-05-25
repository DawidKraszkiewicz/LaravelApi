<?php
declare(strict_types=1);
namespace App\Repositories\Interfaces;

interface UserRepositoryInterface
{
    public function all();

    public function create(array $data);

    public function update(array $data, int $id);

    public function delete(int $id);

    public function find(int $id);

    public function findByEmail(string $email);
}
