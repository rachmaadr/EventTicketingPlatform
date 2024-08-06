<?php

namespace Database\Seeders;

use faker\Factory;
use App\Models\Event;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(int $eventCount = 20, int $ticketCount = 5): void
    {
        //
        if (category::count() === 0) {
            $this->call(CategorySeeder::class);
        }

        $faker = Factory::create();

        for($i = 0; $i < $eventCount; $i++){

            $event = event::create([
                'name' => $faker->sentence(3),
                'slug' => $faker->unique()->slug(2),
                'headline' => $faker->sentence(7),
                'description' => $faker->paragraph(),
                'start_time' => $faker->dateTimeBetween('+1 month', '+6 months'),
                'location' => $faker->address(),
                'duration' => $faker->numberBetween(1, 20),
                'category_id' => category::inRandomOrder()->first()->id,
                'type' => $faker->randomElement(['online', 'offline']),
                'is_popular' => $faker->boolean(20),

            ]);

            for($j = 0; $j < $ticketCount; $j++){
                
                $event->tickets()->create([
                    'name' => $faker->sentence(3),
                    'price' => $faker->numberBetween(100, 1000),
                    'quantity' => $faker->numberBetween(10, 100),
                    'max_buy' => $faker->numberBetween(1, 10),

                ]);
            }
        }

    }
}
