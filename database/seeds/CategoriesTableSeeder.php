<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data=[
        	[
        		'cate_name'=>'Iphone',
        		'cate_slug'=>str_slug('Iphone')


        	],
        	[
        		'cate_name'=>'SamSung',
        		'cate_slug'=>str_slug('SamSung')


        	]



        ];
        DB::table('categories')->insert($data);
    }
}
