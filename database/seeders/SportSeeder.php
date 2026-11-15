<?php

namespace Database\Seeders;

use App\Models\Sport;
use App\Models\SportCategory;
use Illuminate\Database\Seeder;

class SportSeeder extends Seeder
{
    public function run(): void
    {
        $catalogue = [
            'Racket Sports' => ['Badminton', 'Tennis', 'Table Tennis'],
            'Team Sports' => ['Football', 'Cricket', 'Basketball', 'Volleyball', 'Kabaddi'],
            'Water Sports' => ['Swimming'],
            'Combat Sports' => ['Boxing', 'Karate'],
            'Fitness' => ['Running', 'Yoga'],
        ];

        foreach ($catalogue as $categoryName => $sports) {
            $category = SportCategory::firstOrCreate(['name' => $categoryName]);

            foreach ($sports as $sportName) {
                Sport::firstOrCreate(
                    ['name' => $sportName],
                    ['sport_category_id' => $category->id, 'is_active' => true]
                );
            }
        }
    }
}
