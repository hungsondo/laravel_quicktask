<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->delete();
        DB::table('categories')->insert([
            ['id'=>1, 'name'=> 'Điện thoại', 'desc'=>"desc", 'parent_id'=>null],
            ['id'=>2, 'name'=>'Laptop', 'desc'=>"desc", 'parent_id'=>null],
            ['id'=>3, 'name'=>'PC', 'desc'=>"desc", 'parent_id'=>null],
            ['id'=>4, 'name'=>'PC dell', 'desc'=>"desc", 'parent_id'=>3],
            ['id'=>5, 'name'=>'PC asus', 'desc'=>"desc", 'parent_id'=>3],
            ['id'=>6, 'name'=>'PC acer', 'desc'=>"desc", 'parent_id'=>3],
        ]);
    }
}
