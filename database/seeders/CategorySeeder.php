<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
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
        DB::table('categories')->insert([
            'id' => 1,
            'name' => 'Kompjuteri',
        ]);
        DB::table('categories')->insert([
            'id' => 2,
            'name' => 'Automobili',
        ]);
        DB::table('categories')->insert([
            'id' => 3,
            'parent_id' => 1,
            'name' => 'CPU',
        ]);
        DB::table('categories')->insert([
            'id' => 4,
            'parent_id' => 1,
            'name' => 'Hard Disk',
        ]);
        DB::table('categories')->insert([
            'id' => 5,
            'parent_id' => 1,
            'name' => 'GPU',
        ]);
        DB::table('categories')->insert([
            'id' => 6,
            'parent_id' => 2,
            'name' => 'Audi',
        ]);
        DB::table('categories')->insert([
            'id' => 7,
            'parent_id' => 2,
            'name' => 'Reno',
        ]);
        DB::table('categories')->insert([
            'id' => 8,
            'parent_id' => 2,
            'name' => 'Mercedes',
        ]);
        DB::table('categories')->insert([
            'id' => 9,
            'parent_id' => 4,
            'name' => 'HDD',
        ]);
        DB::table('categories')->insert([
            'id' => 10,
            'parent_id' => 4,
            'name' => 'SSD',
        ]);
    }
}
