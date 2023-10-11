<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Region\Province;
use Illuminate\Support\Facades\Http;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $raw_data_provinces = Http::get('https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json');
        $data_province = json_decode($raw_data_provinces->body());

        for ($i=0; $i < count($data_province); $i++) { 
            Province::create([
                'province_id' => $data_province[$i]->id,
                'province_name' => $data_province[$i]->name
            ]);
        }
    }
}
