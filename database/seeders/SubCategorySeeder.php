<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sub_categories')->insert([
            'id' => 1,
            'category_id' => 1,
            'name' => 'CPU',
        ]);
        DB::table('sub_categories')->insert([
            'id' => 2,
            'category_id' => 1,
            'name' => 'Hard Drive',
        ]);
        DB::table('sub_categories')->insert([
            'id' => 3,
            'category_id' => 1,
            'name' => 'GPU',
        ]);
        DB::table('sub_categories')->insert([
            'id' => 4,
            'category_id' => 2,
            'name' => 'Audi',
        ]);
        DB::table('sub_categories')->insert([
            'id' => 5,
            'category_id' => 2,
            'name' => 'Reno',
        ]);
        DB::table('sub_categories')->insert([
            'id' => 6,
            'category_id' => 2,
            'name' => 'Mercedes',
        ]);
    }
}
