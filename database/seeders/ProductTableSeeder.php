<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $products = [
        //     [ 'name ' => 'abc','description' => 'ajhdghhgsfhjdsgf','price' => 200.00,'stock' => 50,'created_at' => now(),'updated_at' => now()],
        //     [ 'name ' => 'abcd','description' => 'ajhdghhgsfhjdsdssdgf','price' => 100.00,'stock' => 110,'created_at' => now(),'updated_at' => now()],
        //     [ 'name ' => 'abce','description' => 'ajhdghhgsfhjsdfsfdsgf','price' => 300.00,'stock' => 250,'created_at' => now(),'updated_at' => now()],
        //     [ 'name ' => 'abcf','description' => 'ajhdghhgsfhdsfdsfjdsgf','price' => 400.00,'stock' => 150,'created_at' => now(),'updated_at' => now()],
        // ];
    Product::create ([
        'name' => 'abc',
        'description' => 'sajkhsjhas',
        'price' => 200,
        'stock' => 20
    ]);
    Product::create ([
        'name' => 'abcd',
        'description' => 'sajkhsjhaqwqws',
        'price' => 200,
        'stock' => 40
    ]);
    Product::create ([
        'name' => 'abcwq',
        'description' => 'sajkhsqwwjhas',
        'price' => 100,
        'stock' => 50
    ]);
    Product::create ([
        'name' => 'abcqw',
        'description' => 'sajkhqwwqsjhas',
        'price' => 300,
        'stock' => 80
    ]);
       
    }
}
