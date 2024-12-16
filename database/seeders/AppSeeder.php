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
                'title' => 'Charred Veggie and Fried Goat Cheese Salad',
                'recipe' => '1. Prep veggies... 2. Add goat cheese...',
                'image' => 'https://via.placeholder.com/350x200?text=Breakfast',
                'calories' => 260,
                'fat' => 26.0,
                'protein' => 14.0,
                'net_carbs' => 1.0
            ];
            $meals[] = [
                'day_id' => $i,
                'type' => 2, // Lunch
                'title' => 'Low Carb Spicy Baked Eggs with Cheesy Hash',
                'recipe' => '1. Bake eggs... 2. Add cheese...',
                'image' => 'https://via.placeholder.com/350x200?text=Lunch',
                'calories' => 350,
                'fat' => 30.0,
                'protein' => 18.0,
                'net_carbs' => 3.0
            ];
            $meals[] = [
                'day_id' => $i,
                'type' => 3, // Dinner
                'title' => 'Keto Chorizo Shakshuka',
                'recipe' => '1. Fry chorizo... 2. Bake with eggs...',
                'image' => 'https://via.placeholder.com/350x200?text=Dinner',
                'calories' => 300,
                'fat' => 26.0,
                'protein' => 14.0,
                'net_carbs' => 2.0
            ];
        }

        DB::table('days')->insert($days);
        DB::table('meals')->insert($meals);
    }
}
