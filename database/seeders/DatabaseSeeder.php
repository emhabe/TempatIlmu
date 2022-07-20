<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Jurusan;
use App\Models\Kelas;

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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        $data = [
            [
                'nama' => 'X',
            ],
            [
                'nama' => 'XI',
            ],
            [
                'nama' => 'XII',
            ],
        ];
        Kelas::insert($data);


        $data1 = [
            [
                'nama' => 'RPL',
            ],
            [
                'nama' => 'TKJ',
            ],
            [
                'nama' => 'MM',
            ],
            [
                'nama' => 'TBSM',
            ],
            [
                'nama' => 'TEI',
            ],
            [
                'nama' => 'TKR',
            ],
        ];
        Jurusan::insert($data1);
    }
}
