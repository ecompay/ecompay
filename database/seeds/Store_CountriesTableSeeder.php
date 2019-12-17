<?php

use Illuminate\Database\Seeder;

use App\Country;

class Store_CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $country = new Country();
        $country->country_code = 'AT';
        $country->country_name = 'Austria';
        $country->save();
    }
}
