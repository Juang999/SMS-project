<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Http;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('province', function () {
    $provinces = Http::get('https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json');
    $data_provinces = json_decode($provinces->body());
    if (is_array($data_provinces)) {
        $this->comment($data_provinces);
    } else {
        $this->comment('data bukan array');
    }
})->purpose('Get data province');
