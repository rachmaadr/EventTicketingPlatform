<?php

namespace Database\Seeders;

use App\Models\category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $categories = [
            [
                'name' => 'Music',
                'icon' => 'null'
            ],

            [
                'name' => 'Workshop',
                'icon' => 'null'
            ],

            [
                'name' => 'Business',
                'icon' => 'null'
            ],

            [
                'name' => 'Food',
                'icon' => 'null'
            ],

            [
                'name' => 'Startup',
                'icon' => 'null'
            ],

            [
                'name' => 'Movies',
                'icon' => 'null'
            ],

            [
                'name' => 'Game',
                'icon' => 'null'
            ],

            
        ];

        foreach ($categories as $category){
            category::create([
                'name' => $category['name'],
                'icon' => $category['icon']
            ]);
        }
    }
}
