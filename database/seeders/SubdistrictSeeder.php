<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Region\Subdistrict;
use App\Models\Region\City;
use Illuminate\Support\Facades\Http;

class SubdistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = City::get();

        foreach ($cities as $city) {
            $raw_data_city = Http::timeout(60)->get("https://www.emsifa.com/api-wilayah-indonesia/api/districts/".$city->city_id.".json");
            $subdistricts = json_decode($raw_data_city->body());

            foreach ($subdistricts as $subdistrict) {
                Subdistrict::create([
                    'province_id' => $city->province_id,
                    'city_id' => $city->id,
                    'subdistrict_id' => $subdistrict->id,
                    'subdistrict_name' => $subdistrict->name
                ]);
            }
        }
    }
}
