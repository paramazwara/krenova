<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // TAHUN
        DB::table('_thn')->insert([ 'tahun' => '2016' ]);
        DB::table('_thn')->insert([ 'tahun' => '2017' ]);
        DB::table('_thn')->insert([ 'tahun' => '2018' ]);
        // DB::table('_thn')->insert([ 'tahun' => '2019' ]);
        // DB::table('_thn')->insert([ 'tahun' => '2020' ]);
        // DB::table('_thn')->insert([ 'tahun' => '2021' ]);

        //
    }
}
