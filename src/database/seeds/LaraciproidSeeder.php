<?php

use Illuminate\Database\Seeder;
use App\Models\Province;
use App\Models\City;

class LaraciproidSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Province::truncate();
        City::truncate();

        $city_sql = File::get(database_path('sql').'/city.sql');
        $province_sql = File::get(database_path('sql').'/province.sql');

        DB::statement($city_sql);
        DB::statement($province_sql);
    }
}

