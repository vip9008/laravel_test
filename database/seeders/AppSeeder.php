<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $days = [];
        $meals = [];
        for ($i = 1; $i <= 28; $i++) {
            $days[] = ['day_number' => $i, 'date' => "2024-08-".($i < 10 ? "0$i" : $i), 'is_complete' => $i <= 10];

            $meals[] = [
                'day_id' => $i,
                'type' => 1, // Breakfast
                'title' => "Charred Veggie and Fried Goat Cheese Salad (Day: $i)",
                'recipe' => '1. Prep veggies... 2. Add goat cheese...',
                'image' => 'https://via.placeholder.com/350x200?text=Breakfast',
                'calories' => rand(200, 400),
                'fat' => rand(10, 30) + (rand(0, 9) / 10),
                'protein' => rand(10, 25) + (rand(0, 9) / 10),
                'net_carbs' => rand(1, 10) + (rand(0, 9) / 10),
            ];
            $meals[] = [
                'day_id' => $i,
                'type' => 2, // Lunch
                'title' => "Low Carb Spicy Baked Eggs with Cheesy Hash (Day: $i)",
                'recipe' => '1. Bake eggs... 2. Add cheese...',
                'image' => 'https://via.placeholder.com/350x200?text=Lunch',
                'calories' => rand(200, 400),
                'fat' => rand(10, 30) + (rand(0, 9) / 10),
                'protein' => rand(10, 25) + (rand(0, 9) / 10),
                'net_carbs' => rand(1, 10) + (rand(0, 9) / 10),
            ];
            $meals[] = [
                'day_id' => $i,
                'type' => 3, // Dinner
                'title' => "Keto Chorizo Shakshuka (Day: $i)",
                'recipe' => '1. Fry chorizo... 2. Bake with eggs...',
                'image' => 'https://via.placeholder.com/350x200?text=Dinner',
                'calories' => rand(200, 400),
                'fat' => rand(10, 30) + (rand(0, 9) / 10),
                'protein' => rand(10, 25) + (rand(0, 9) / 10),
                'net_carbs' => rand(1, 10) + (rand(0, 9) / 10),
            ];
        }

        DB::table('days')->insert($days);
        DB::table('meals')->insert($meals);
    }
}
