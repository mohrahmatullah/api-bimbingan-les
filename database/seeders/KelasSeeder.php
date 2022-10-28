<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kelas;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kelas::truncate();
        
        $objects = [
            ['nama' => 'Kelas Pagi'],
            ['nama' => 'Kelas Siang'],
            ['nama' => 'Kelas Malam']
        ];
        
        foreach ($objects as $row) {
            Kelas::create($row);
        }
    }
}
