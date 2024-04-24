<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mahasiswa')->insert(
                [
                    [
                        'nim'=>'sv_001',
                        'nama'=>'joko',
                        'alamat'=>'bantul',
                        'tanggal_lahir'=>'1999-12-07'
                    ],
                    [
                        'nim'=>'sv_002',
                        'nama'=>'paul',
                        'alamat'=>'sleman',
                        'tanggal_lahir'=>'2000-10-07'
                    ],
                    [
                        'nim'=>'sv_003',
                        'nama'=>'andy',
                        'alamat'=>'surabaya',
                        'tanggal_lahir'=>'2000-02-09'
                    ]
                ]
            );
        }
}
