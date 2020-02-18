<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        \App\User::create(['email'=>'abc@gmail.com', 'name' => 'abc', 'password' => bcrypt('123'),'city'=>'Bayan Lepas'
        ,'country'=>'Malaysia','postcode'=>'11900','address'=>'1, Jalan Mutiara 3, Taman Mutiara','phone'=>'01023412324',
        'gender'=>'Female']);
        \App\User::create(['email'=>'aaa@gmail.com', 'name' => 'David', 'password' => bcrypt('456'),'city'=>'Bukit Mertajam'
        ,'country'=>'Malaysia','postcode'=>'14000','address'=>'19, Jalan Duku 1, Taman Duku','phone'=>'0168172635',
        'gender'=>'Male']);
        \App\Product::create(['name'=>'Short Sleeve Dress', 'description' => 'Color available: Black, White', 'price' => '85.00']);
        \App\Product::create(['name'=>'Short Sleeve Dress', 'description' => '100% Cotton', 'price' => '72.00']);
        \App\Product::create(['name'=>'Graphic T-shirt', 'description' => 'Disney Limited Edition', 'price' => '49.90']);
        \App\Product::create(['name'=>'T-shirt', 'description' => 'Made In Vietnam', 'price' => '39.90']);
        \App\Product::create(['name'=>'Straight Jeans', 'description' => 'High Rise', 'price' => '80.00']);
        \App\Product::create(['name'=>'Ultra Stretch Jeans', 'description' => 'Color available: Black, White', 'price' => '78.80']);
    }
}
