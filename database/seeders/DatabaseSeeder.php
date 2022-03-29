<?php

namespace Database\Seeders;

use App\Models\JenisUsaha;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $admin = Role::create([
            'nama_role' => 'Admin',
        ])->getAttributes();
        $juruPajak = Role::create([
            'nama_role' => 'Juru Pajak',
        ])->getAttributes();
        $owner = Role::create([
            'nama_role' => 'Owner',
        ])->getAttributes();

        Users::create([
            'role_id' => $admin['role_id'],
            'no_identitas' => '1231231231123123',
            'nama' => 'Admin',
            'jk' => 'Laki-laki',
            'no_hp' => '082131297231',
            'alamat' => 'Jln. Diskominfo No 03',
            'npwp' => '1231231231123123',
            'email' => 'admin@mail.com',
            'password' => Hash::make('admin1234'),
        ]);

        Users::create([
            'role_id' => $juruPajak['role_id'],
            'no_identitas' => '1231231231123123',
            'nama' => 'Juru Pajak',
            'jk' => 'Laki-laki',
            'no_hp' => '082131297231',
            'alamat' => 'Jln. Diskominfo No 03',
            'npwp' => '1231231231123123',
            'email' => 'jurupajak@mail.com',
            'password' => Hash::make('admin1234'),
        ]);

        Users::create([
            'role_id' => $owner['role_id'],
            'no_identitas' => '1231231231123123',
            'nama' => 'Owner',
            'jk' => 'Laki-laki',
            'no_hp' => '082131297231',
            'alamat' => 'Jln. Diskominfo No 03',
            'npwp' => '1231231231123123',
            'email' => 'owner@mail.com',
            'password' => Hash::make('admin1234'),
        ]);

        JenisUsaha::create([
            'nama_jenis_usaha' => 'Pakaian'
        ]);
        JenisUsaha::create([
            'nama_jenis_usaha' => 'Kuliner'
        ]);
        JenisUsaha::create([
            'nama_jenis_usaha' => 'Elektronik'
        ]);
        JenisUsaha::create([
            'nama_jenis_usaha' => 'Oleh-oleh'
        ]);
        JenisUsaha::create([
            'nama_jenis_usaha' => 'Furnitur'
        ]);
        JenisUsaha::create([
            'nama_jenis_usaha' => 'Pakaian'
        ]);
        JenisUsaha::create([
            'nama_jenis_usaha' => 'Serba Ada'
        ]);
    }
}
