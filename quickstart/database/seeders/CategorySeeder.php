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
            ['id'=>1, 'name'=> 'Điện thoại', 'desc'=>"desc"],
            ['id'=>2, 'name'=>'Laptop', 'desc'=>"desc"],
            ['id'=>3, 'name'=>'PC', 'desc'=>"desc"],
        ]);
    }
}
