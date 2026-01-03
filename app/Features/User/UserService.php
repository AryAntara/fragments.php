<?php 

namespace App\Features\User;

class UserServices {
    public function __construct(
        private UserRepository $userRepository
    ) {
    }

    public function getUserById(int $id): ?UserEntity {
        return $this->userRepository->findOne($id);
    }
    
}