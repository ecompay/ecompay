<?php

use Illuminate\Database\Seeder;

use App\Country;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $country = new Country();
        $country->country_code = 'DK';
        $country->country_name = 'Denmark';
        $country->save();


        $country = new Country();
        $country->country_code = 'AF';
        $country->country_name = 'Afghanistan';
        $country->save();

        $country = new Country();
        $country->country_code = 'AL';
        $country->country_name = 'Albania';
        $country->save();



        $country = new Country();
        $country->country_code = 'DZ';
        $country->country_name = 'Algeria';
        $country->save();


        $country = new Country();
        $country->country_code = 'DS';
        $country->country_name = 'American Samoa';
        $country->save();


        $country = new Country();
        $country->country_code = 'AD';
        $country->country_name = 'Andorra';
        $country->save();


        $country = new Country();
        $country->country_code = 'AO';
        $country->country_name = 'Angola';
        $country->save();


        $country = new Country();
        $country->country_code = 'AI';
        $country->country_name = 'Anguilla';
        $country->save();

        $country = new Country();
        $country->country_code = 'AQ';
        $country->country_name = 'Antarctica';
        $country->save();


        $country = new Country();
        $country->country_code = 'AG';
        $country->country_name = 'Antigua and Barbuda';
        $country->save();


        $country = new Country();
        $country->country_code = 'AR';
        $country->country_name = 'Argentina';
        $country->save();

        $country = new Country();
        $country->country_code = 'AM';
        $country->country_name = 'Armenia';
        $country->save();


        $country = new Country();
        $country->country_code = 'AW';
        $country->country_name = 'Aruba';
        $country->save();


        $country = new Country();
        $country->country_code = 'AU';
        $country->country_name = 'Australia';
        $country->save();


        $country = new Country();
        $country->country_code = 'AT';
        $country->country_name = 'Austria';
        $country->save();


        $country = new Country();
        $country->country_code = 'AZ';
        $country->country_name = 'Azerbaijan';
        $country->save();

        $country = new Country();
        $country->country_code = 'US';
        $country->country_name = 'United States';
        $country->save();
    }
}
