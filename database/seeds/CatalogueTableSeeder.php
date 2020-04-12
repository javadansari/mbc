<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatalogueTableSeeder extends Seeder
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
            DB::table('catalogues')
                ->insert([
                    'project' => $faker->sentence(1),
                    'type' => $faker->sentence(1),
                    'size1' => $faker->numberBetween(20,1000),
                    'size2' => $faker->numberBetween(20,1000),
                    'name' => $faker->sentence(3),
                    'status' => $faker->sentence(3),
                    'comment' => $faker->sentence,
                    'link' => $faker->sentence,
                ]);
        endfor;
    }
}
