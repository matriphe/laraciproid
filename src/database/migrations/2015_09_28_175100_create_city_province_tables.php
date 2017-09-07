<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCityProvinceTables extends Migration
{
    public function __construct()
    {
        $this->tablename_city = config('laraciproid.city');
        $this->tablename_province = config('laraciproid.province');
    }

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create($this->tablename_city, function (Blueprint $table) {
            $table->smallInteger('city_id', 1, 1);
            $table->tinyInteger('province_id')->unsigned()->index();
            $table->string('city_name', 50)->index();
            $table->string('city_name_full', 100)->index();
            $table->enum('city_type', ['kabupaten', 'kota'])->nullable();
            $table->decimal('city_lat', 10, 6)->nullable()->index();
            $table->decimal('city_lon', 11, 6)->nullable()->index();
        });
        Schema::create($this->tablename_province, function (Blueprint $table) {
            $table->tinyInteger('province_id', 1, 1);
            $table->string('province_name', 50);
            $table->string('province_name_abbr', 50);
            $table->string('province_name_id', 50);
            $table->string('province_name_en', 50);
            $table->smallInteger('province_capital_city_id')->unsigned()->index();
            $table->string('iso_code', 5)->index();
            $table->string('iso_name', 50);
            $table->enum('iso_type',
            [
                'province',
                'autonomous province',
                'special district',
                'special region',
            ]);
            $table->string('iso_geounit', 2)->index();
            $table->tinyInteger('timezone');
            $table->decimal('province_lat', 10, 6)->nullable()->index();
            $table->decimal('province_lon', 11, 6)->nullable()->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop($this->tablename_city);
        Schema::drop($this->tablename_province);
    }
}
