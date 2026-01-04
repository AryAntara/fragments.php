<?php

namespace App\Features\User;

use Fragments\Lib\Database\Database;

class UserRepository
{
    public function __construct(private Database $db)
    {
    }
    public function findOne(int $id): ?UserEntity
    {
        // Dummy data for demonstration
        if ($id === 1) {
            $raw = $this->db->query('SELECT * FROM users limit 1')[0];
            return new UserEntity(
                id: (int)$raw['organization_user_uuid'],
                name: $raw['name'],
                email: $raw['email']
            );
        }
        return null;
    }
}