<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jurusan;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jurusan::truncate();
        
        $objects = [
            ['kode_jurusan' => 'PA', 'nama_jurusan' => 'IPA'],
            ['kode_jurusan' => 'PS', 'nama_jurusan' => 'IPS'],
            ['kode_jurusan' => 'MTK', 'nama_jurusan' => 'MATEMATIKA']
        ];
        
        foreach ($objects as $row) {
            Jurusan::create($row);
        }
    }
}
