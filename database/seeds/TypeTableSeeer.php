<?php

use Illuminate\Database\Seeder;

class TypeTableSeeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('types')->insert(['type' =>'Elbow']);
        DB::table('types')->insert(['type' =>'Tube']);
        DB::table('types')->insert(['type' =>'Tee']);
        DB::table('types')->insert(['type' =>'Redu']);
    }
}
