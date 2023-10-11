<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Region\City;
use App\Models\Region\Province;
use Illuminate\Support\Facades\Http;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $provinces = Province::get();
        foreach ($provinces as $province) {
            $raw_data_city = Http::get("https://www.emsifa.com/api-wilayah-indonesia/api/regencies/".$province->province_id.".json");
            $cities = json_decode($raw_data_city->body());

            foreach ($cities as $city) {
                City::create([
                    'province_id' => $province->id,
                    'city_id' => $city->id,
                    'city_name' => $city->name
                ]);
            }
        }
    }
}
