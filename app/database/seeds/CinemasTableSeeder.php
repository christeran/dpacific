<?php
 
class CinemasTableSeeder extends Seeder {
 
    public function run()
    {
        DB::table('cinemas')->delete();
 
        Cinema::create(array(
            'name' => 'iCinema UNSW',
            'address' => 'UNSW Kensington NSW 2052',
            'geo' => '-33.9009313/151.2369828,13'
        ));

        Cinema::create(array(
            'name' => 'Hoyts Eastgardens',
            'address' => 'Centre/152 Bunnerong Rd Pagewood NSW 2035',
            'geo' => '-33.94504/151.225769'
        ));

        Cinema::create(array(
            'name' => 'Ritz Cinema',
            'address' => '45 St Pauls Street Randwick NSW 2031',
            'geo' => '-33.920208/151.243328'
        ));

        Cinema::create(array(
            'name' => 'Hoyts Entertainment Quarter',
            'address' => '122 Lang Rd Moore Park NSW 2021',
            'geo' => '-33.894506/151.227595'
        ));

        Cinema::create(array(
            'name' => 'Palace Verona',
            'address' => '17 Oxford Street Paddington NSW 2021',
            'geo' => '-33.882521/151.219781'
        ));  


        Cinema::create(array(
            'name' => 'imax',
            'address' => '31 Wheat Road Darling Harbour NSW 2000',
            'geo' => '-33.873665/151.201583'
        ));               
    }
 
}
