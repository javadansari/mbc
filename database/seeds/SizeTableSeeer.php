<?php

use Illuminate\Database\Seeder;

class SizeTableSeeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('sizes')->insert(['size' =>'20']);
        DB::table('sizes')->insert(['size' =>'25']);
        DB::table('sizes')->insert(['size' =>'40']);
        DB::table('sizes')->insert(['size' =>'50']);
        DB::table('sizes')->insert(['size' =>'65']);
        DB::table('sizes')->insert(['size' =>'80']);
        DB::table('sizes')->insert(['size' =>'100']);
        DB::table('sizes')->insert(['size' =>'150']);
        DB::table('sizes')->insert(['size' =>'200']);
        DB::table('sizes')->insert(['size' =>'250']);
        DB::table('sizes')->insert(['size' =>'300']);
    }
}
