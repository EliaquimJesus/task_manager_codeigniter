<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UtilizadoresSeeder extends Seeder
{
    public function run()
    {
        // Create 3 users
        $users = [
            [
                'utilizador' => 'user1',
                'passwrd' => password_hash('user1', PASSWORD_DEFAULT),
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'utilizador' => 'user2',
                'passwrd' => password_hash('user2', PASSWORD_DEFAULT),
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'utilizador' => 'user3',
                'passwrd' => password_hash('user3', PASSWORD_DEFAULT),
                'created_at' => date('Y-m-d H:i:s')
            ]
            ];

        //
        $this->db->table('utilizadores')->insertBatch($users);
    }
}
