<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;
use Faker\Factory;

class SeedAccount extends Seeder
{
    public function run()
    {
        $faker = Factory::create();
        $dataAccount = [];
        $dataPengguna = [];
        for ($i = 0; $i < 1000; $i++) {
            $id = $faker->unique()->regexify('[A-Za-z0-9]{15}');
            $dataAccount[] = [                
                'id'         => $id,
                'pass'   => $faker->password,
                'is_admin' => Time::now(),                
                'created_at' => Time::now()
            ];
            $dataPengguna [] = [
                'acc_id'        => $id,
                'name'      => $faker->name(),
                'email'     => $faker->email(),
                'phone'     => $faker->phoneNumber(),
                'address'  => $faker->address(),
                'pict'      => 'https://randomuser.me/api/portraits/men/3.jpg'                
            ];
            
        }

        $this->db->table('akun')->insertBatch($dataAccount);
        $this->db->table('pengguna')->insertBatch($dataPengguna);
    }
}
