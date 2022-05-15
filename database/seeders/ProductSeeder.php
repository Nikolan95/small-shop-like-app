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
            'category_id' => 3,
            'title' => 'Ryzen 5 1400',
            'status' => 'Used',
            'phone' => 060002200,
            'location' => 'Savska 10',
            'price' => '50',
            'approve' => 'approved',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        ]);
        DB::table('products')->insert([
            'id' => 2,
            'user_id' => 2,
            'category_id' => 3,
            'title' => 'Intel i5 10th gen',
            'status' => 'Used',
            'phone' => 060002200,
            'location' => 'Savska 10',
            'price' => '80',
            'approve' => 'approved',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        ]);
        DB::table('products')->insert([
            'id' => 3,
            'user_id' => 1,
            'category_id' => 3,
            'title' => 'intel i3 11th gen',
            'status' => 'Used',
            'phone' => 060002200,
            'location' => 'Savska 10',
            'price' => '80',
            'approve' => 'approved',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        ]);
        DB::table('products')->insert([
            'id' => 4,
            'user_id' => 2,
            'category_id' => 3,
            'title' => 'ryzen 5 5600',
            'status' => 'Used',
            'phone' => 060002200,
            'location' => 'Savska 10',
            'price' => '150',
            'approve' => 'approved',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        ]);
        DB::table('products')->insert([
            'id' => 6,
            'user_id' => 2,
            'category_id' => 3,
            'title' => 'inter i9 12thgen',
            'status' => 'Used',
            'phone' => 060002200,
            'location' => 'Savska 10',
            'price' => '350',
            'approve' => 'approved',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        ]);
        DB::table('products')->insert([
            'id' => 7,
            'user_id' => 1,
            'category_id' => 10,
            'title' => 'ssd 512',
            'status' => 'Used',
            'phone' => 060002200,
            'location' => 'Savska 10',
            'price' => '150',
            'approve' => 'approved',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        ]);
        DB::table('products')->insert([
            'id' => 8,
            'user_id' => 2,
            'category_id' => 9,
            'title' => 'hdd 1tb',
            'status' => 'Used',
            'phone' => 060002200,
            'location' => 'Savska 10',
            'price' => '250',
            'approve' => 'approved',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        ]);
        DB::table('products')->insert([
            'id' => 9,
            'user_id' => 1,
            'category_id' => 5,
            'title' => 'rtx 3060',
            'status' => 'Used',
            'phone' => 060002200,
            'location' => 'Savska 10',
            'price' => '750',
            'approve' => 'approved',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        ]);
        DB::table('products')->insert([
            'id' => 10,
            'user_id' => 1,
            'category_id' => 5,
            'title' => 'rtx 3070',
            'status' => 'Used',
            'phone' => 060002200,
            'location' => 'Savska 10',
            'price' => '850',
            'approve' => 'approved',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        ]);
        DB::table('products')->insert([
            'id' => 11,
            'user_id' => 2,
            'category_id' => 5,
            'title' => 'rtx 3070ti',
            'status' => 'Used',
            'phone' => 060002200,
            'location' => 'Savska 10',
            'price' => '1050',
            'approve' => 'approved',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        ]);
        DB::table('products')->insert([
            'id' => 12,
            'user_id' => 1,
            'category_id' => 6,
            'title' => 'a3',
            'status' => 'Used',
            'phone' => 060002200,
            'location' => 'Savska 10',
            'price' => '3050',
            'approve' => 'approved',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        ]);
        DB::table('products')->insert([
            'id' => 13,
            'user_id' => 2,
            'category_id' => 6,
            'title' => 'a4',
            'status' => 'Used',
            'phone' => 060002200,
            'location' => 'Savska 10',
            'price' => '5050',
            'approve' => 'approved',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        ]);
        DB::table('products')->insert([
            'id' => 14,
            'user_id' => 1,
            'category_id' => 7,
            'title' => 'clio',
            'status' => 'Used',
            'phone' => 060002200,
            'location' => 'Savska 10',
            'price' => '2050',
            'approve' => 'approved',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        ]);
        DB::table('products')->insert([
            'id' => 15,
            'user_id' => 2,
            'category_id' => 7,
            'title' => 'Megan',
            'status' => 'Used',
            'phone' => 060002200,
            'location' => 'Savska 10',
            'price' => '3050',
            'approve' => 'approved',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        ]);
        DB::table('products')->insert([
            'id' => 16,
            'user_id' => 1,
            'category_id' => 8,
            'title' => 'A class',
            'status' => 'Used',
            'phone' => 060002200,
            'location' => 'Savska 10',
            'price' => '7050',
            'approve' => 'approved',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        ]);
        DB::table('products')->insert([
            'id' => 17,
            'user_id' => 2,
            'category_id' => 8,
            'title' => 'z klase',
            'status' => 'Used',
            'phone' => 060002200,
            'location' => 'Savska 10',
            'price' => '12050',
            'approve' => 'approved',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        ]);
        DB::table('products')->insert([
            'id' => 18,
            'user_id' => 2,
            'category_id' => 8,
            'title' => 'z klase',
            'status' => 'Used',
            'phone' => 060002200,
            'location' => 'Savska 10',
            'price' => '12050',
            'approve' => 'in process',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        ]);
        DB::table('products')->insert([
            'id' => 19,
            'user_id' => 1,
            'category_id' => 8,
            'title' => 'z klase',
            'status' => 'Used',
            'phone' => 060002200,
            'location' => 'Savska 10',
            'price' => '12050',
            'approve' => 'in process',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        ]);
        DB::table('products')->insert([
            'id' => 20,
            'user_id' => 2,
            'category_id' => 8,
            'title' => 'z klase',
            'status' => 'Used',
            'phone' => 060002200,
            'location' => 'Savska 10',
            'price' => '12050',
            'approve' => 'denied',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        ]);
    }
}
