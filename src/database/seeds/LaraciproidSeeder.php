<?php

use Illuminate\Database\Seeder;
use App\Models\Province;
use App\Models\City;

class LaraciproidSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Province::truncate();
        City::truncate();

        $jsonProvinces = File::get(database_path('json/provinces.json'));
        $dataProvinces = json_decode($jsonProvinces);
        $dataProvinces = collect($dataProvinces);

        foreach ($dataProvinces as $d) {
            $d = collect($d)->toArray();
            $p = new Province();
            $p->fill($d);
            $p->save();
        }

        $jsonCities = File::get(database_path('json/cities.json'));
        $dataCities = json_decode($jsonCities);
        $dataCities = collect($dataCities);

        foreach ($dataCities as $d) {
            $d = collect($d)->toArray();
            $p = new City();
            $p->fill($d);
            $p->save();
        }
    }
}
