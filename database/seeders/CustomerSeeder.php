<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\customertable;
use Faker\Factory as Faker;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void

    {
        $Faker =Faker::Create();
        for($i =0 ; $i<=20 ;$i++)
        {
            $customer =new Customertable;
        $customer->name = "$Faker->name";
        $customer->email = "$Faker->email";
        $customer->gender = "M";
        $customer->address = "$Faker->address";
        $customer->country = "$Faker->country";
        $customer->save();
        }
        
    }
}
