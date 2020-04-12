<?php

use App\Session;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SessionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = \Faker\Factory::create();
        for($i=0; $i<=100; $i++):
            DB::table('sessions')
                ->insert([
                    'title' => $faker->sentence,
                ]);
        endfor;
    }
}
