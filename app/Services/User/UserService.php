<?php
declare(strict_types=1);
namespace App\Services\User;

use App\Repositories\Interfaces\UserRepositoryInterface;

class UserService {
    protected UserRepositoryInterface $userRepository;
    public function __construct(UserRepositoryInterface $userRepository){
        $this->userRepository = $userRepository;
    }
    public function create(array $data) {
        return $this->userRepository->create($data);
    }
    public function update(array $data, int $id) {
        return $this->userRepository->update($data, $id);
    }
    public function delete(int $id) {
        return $this->userRepository->delete($id);
    }
    public function find(int $id) {
        return $this->userRepository->find($id);
    }
    public function all() {
        return $this->userRepository->all();
    }

}
