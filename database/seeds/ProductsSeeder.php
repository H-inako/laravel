<?php

use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product_categories=[
            ['id'=>1,'name'=>'インテリア'],

            ['id'=>2,'name'=>'家電'],

            ['id'=>3,'name'=>'ファッション'],

            ['id'=>4,'name'=>'美容'],

            ['id'=>5,'name'=>'本・雑誌'],
        ];

        DB::table('product_categories')->insert($product_categories);
    }
}
