<?php

use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
            [
                'first_name' => 'Jan',
                'last_name'  => 'Nowak',
                'phone'      => '123123123',
                'email'      => 'jan@nowak.com',
                'city'       => 'Gdańsk',
            ],
            [
                'first_name' => 'Aleks',
                'last_name'  => 'Nowak',
                'phone'      => '63746583',
                'email'      => 'aleks@nowak.com',
                'city'       => 'Kraków',
            ],
            [
                'first_name' => 'Włodzimierz',
                'last_name'  => 'Nowak',
                'phone'      => '3467235235',
                'email'      => 'wlodzimierz@nowak.com',
                'city'       => 'Wrocław',
            ],
        ]);
    }
}
