<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BibleReading;
use Carbon\Carbon;

class BibleReadingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = [
            ['name' => 'Matius', 'chapters' => 28],
            ['name' => 'Markus', 'chapters' => 16],
            ['name' => 'Lukas', 'chapters' => 24],
            ['name' => 'Yohanes', 'chapters' => 21],
            ['name' => 'Kisah Para Rasul', 'chapters' => 28],
            ['name' => 'Roma', 'chapters' => 16],
            ['name' => '1 Korintus', 'chapters' => 16],
            ['name' => '2 Korintus', 'chapters' => 13],
            ['name' => 'Galatia', 'chapters' => 6],
            ['name' => 'Efesus', 'chapters' => 6],
            ['name' => 'Filipi', 'chapters' => 4],
            ['name' => 'Kolose', 'chapters' => 4],
            ['name' => '1 Tesalonika', 'chapters' => 5],
            ['name' => '2 Tesalonika', 'chapters' => 3],
            ['name' => '1 Timotius', 'chapters' => 6],
            ['name' => '2 Timotius', 'chapters' => 4],
            ['name' => 'Titus', 'chapters' => 3],
            ['name' => 'Filemon', 'chapters' => 1],
            ['name' => 'Ibrani', 'chapters' => 13],
            ['name' => 'Yakobus', 'chapters' => 5],
            ['name' => '1 Petrus', 'chapters' => 5],
            ['name' => '2 Petrus', 'chapters' => 3],
            ['name' => '1 Yohanes', 'chapters' => 5],
            ['name' => '2 Yohanes', 'chapters' => 1],
            ['name' => '3 Yohanes', 'chapters' => 1],
            ['name' => 'Yudas', 'chapters' => 1],
            ['name' => 'Wahyu', 'chapters' => 22],
        ];

        $startDate = Carbon::create(2025, 8, 4); // Mulai dari 4 Agustus 2025
        $date = $startDate->copy();

        foreach ($books as $book) {
            for ($chapter = 1; $chapter <= $book['chapters']; $chapter++) {
                BibleReading::create([
                    'reading_date' => $date->toDateString(),
                    'passage' => $book['name'] . ' ' . $chapter,
                    'text' => null,
                ]);
                $date->addDay();
            }
        }
    }
}