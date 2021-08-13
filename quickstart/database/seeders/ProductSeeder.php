<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->delete();
        DB::table('products')->insert([
            ['id'=>1,'name'=>'Iphone 12', 'price'=>500000, 'img'=>'no-img.jpg', 'category_id'=>1],
            ['id'=>2,'name'=>' Nokia X4', 'price'=>500000, 'img'=>'no-img.jpg', 'category_id'=>1],
            ['id'=>3,'name'=>'Xiaomi 10', 'price'=>500000, 'img'=>'no-img.jpg', 'category_id'=>1],
            ['id'=>4,'name'=>'Lenovo legion 1', 'price'=>500000, 'img'=>'no-img.jpg', 'category_id'=>2],
            ['id'=>5,'name'=>'Apple M1', 'price'=>500000, 'img'=>'no-img.jpg', 'category_id'=>2],
            ['id'=>6,'name'=>'Dell X44', 'price'=>500000, 'img'=>'no-img.jpg', 'category_id'=>2],
            ['id'=>7,'name'=>'PC Asus', 'price'=>60000, 'img'=>'no-img.jpg', 'category_id'=>3],
            ['id'=>8,'name'=>'PC Gaming', 'price'=>700000, 'img'=>'no-img.jpg', 'category_id'=>3],
            ['id'=>12, 'name'=>'PC Văn phòng', 'price'=>110000, 'img'=>'no-img.jpg', 'category_id'=>3],
            ['id'=>13, 'name'=>'PC Dell', 'price'=>120000, 'img'=>'no-img.jpg', 'category_id'=>3],
        ]);
    }
}
