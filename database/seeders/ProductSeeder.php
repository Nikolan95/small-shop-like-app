<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
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
        DB::table('products')->insert([
            'id' => 1,
            'user_id' => 1,
            'subcategory_id' => 1,
            'name' => 'Ryzen 5 1400',
            'price' => '50',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        ]);
        DB::table('products')->insert([
            'id' => 2,
            'user_id' => 2,
            'subcategory_id' => 1,
            'name' => 'Intel i5 10th gen',
            'price' => '80',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        ]);
        DB::table('products')->insert([
            'id' => 3,
            'user_id' => 1,
            'subcategory_id' => 1,
            'name' => 'intel i3 11th gen',
            'price' => '80',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        ]);
        DB::table('products')->insert([
            'id' => 4,
            'user_id' => 2,
            'subcategory_id' => 1,
            'name' => 'ryzen 5 5600',
            'price' => '150',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        ]);
        DB::table('products')->insert([
            'id' => 6,
            'user_id' => 2,
            'subcategory_id' => 1,
            'name' => 'inter i9 12thgen',
            'price' => '350',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        ]);
        DB::table('products')->insert([
            'id' => 7,
            'user_id' => 1,
            'subcategory_id' => 2,
            'name' => 'ssd 512',
            'price' => '150',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        ]);
        DB::table('products')->insert([
            'id' => 8,
            'user_id' => 2,
            'subcategory_id' => 2,
            'name' => 'ssd 1tb',
            'price' => '250',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        ]);
        DB::table('products')->insert([
            'id' => 9,
            'user_id' => 1,
            'subcategory_id' => 3,
            'name' => 'rtx 3060',
            'price' => '750',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        ]);
        DB::table('products')->insert([
            'id' => 10,
            'user_id' => 1,
            'subcategory_id' => 3,
            'name' => 'rtx 3070',
            'price' => '850',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        ]);
        DB::table('products')->insert([
            'id' => 11,
            'user_id' => 2,
            'subcategory_id' => 3,
            'name' => 'rtx 3070ti',
            'price' => '1050',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        ]);
        DB::table('products')->insert([
            'id' => 12,
            'user_id' => 1,
            'subcategory_id' => 4,
            'name' => 'a3',
            'price' => '3050',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        ]);
        DB::table('products')->insert([
            'id' => 13,
            'user_id' => 2,
            'subcategory_id' => 4,
            'name' => 'a4',
            'price' => '5050',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        ]);
        DB::table('products')->insert([
            'id' => 14,
            'user_id' => 1,
            'subcategory_id' => 5,
            'name' => 'clio',
            'price' => '2050',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        ]);
        DB::table('products')->insert([
            'id' => 15,
            'user_id' => 2,
            'subcategory_id' => 5,
            'name' => 'Megan',
            'price' => '3050',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        ]);
        DB::table('products')->insert([
            'id' => 16,
            'user_id' => 1,
            'subcategory_id' => 6,
            'name' => 'A class',
            'price' => '7050',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        ]);
        DB::table('products')->insert([
            'id' => 17,
            'user_id' => 2,
            'subcategory_id' => 6,
            'name' => 'z klase',
            'price' => '12050',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        ]);
    }
}
