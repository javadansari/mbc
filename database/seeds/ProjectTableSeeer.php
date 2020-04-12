<?php

use Illuminate\Database\Seeder;

class ProjectTableSeeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
            DB::table('projects')->insert(['project' =>'West Karun']);
            DB::table('projects')->insert(['project' =>'Zanjan']);
            DB::table('projects')->insert(['project' =>'Torbat']);
            DB::table('projects')->insert(['project' =>'Rudshor']);
            DB::table('projects')->insert(['project' =>'WTP']);
            DB::table('projects')->insert(['project' =>'Bushehr']);

    }
}
