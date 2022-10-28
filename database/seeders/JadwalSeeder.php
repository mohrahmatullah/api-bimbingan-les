<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jadwal_belajar;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jadwal_belajar::truncate();
        
        $objects = [
            ['waktu' => '08.00-12.00'],
            ['waktu' => '13.00-17.00'],
            ['waktu' => '19.00-23.00']
        ];
        
        foreach ($objects as $row) {
            Jadwal_belajar::create($row);
        }
    }
}
