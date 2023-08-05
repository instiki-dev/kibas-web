<?php

namespace Database\Seeders;

use App\Models\Kelurahan;
use Illuminate\Database\Seeder;

class KelurahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kelurahan = ["Bebalang", "Cempaga", "Kawan", "Kubu"];
        for ($i = 0; $i < count($kelurahan); $i++) {
            $data = ["kelurahan" => $kelurahan[$i]];
            Kelurahan::create($data);
        }
    }
}
