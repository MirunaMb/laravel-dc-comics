<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comic; // Importa la classe del modello Comic

class ComicTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comics = config('db.comics');

        foreach ($comics as $comic) {
            $comic = new Comic();

            $comic->title       = $comic['title'];
            $comic->description = $comic['description'];
            $comic->thumb       = $comic['thumb'];
            $comic->price       = $comic['price'];
            $comic->series      = $comic['series'];
            $comic->sale_date   = $comic['sale_date'];
            $comic->type        = $comic['type'];

            $comic->save();

        }
    }
}