<?php 

namespace App\Features\User;

class UserService {
    public function __construct(
        private UserRepository $userRepository
    ) {
    }

    public function getUserById(int $id): ?UserEntity {
        return $this->userRepository->findOne($id);
    }
    
}