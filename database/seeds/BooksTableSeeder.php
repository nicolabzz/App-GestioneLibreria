<?php

use App\Book;
use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    public function run(Faker $faker)
    {
        $users = User::all('id');

        foreach ($users as $user) {
            for ($i = 0; $i < 5; $i++) {
                $book = new Book([
                    'title'      => $faker->sentence(3),
                    'author'     => $faker->name,
                    'isbn'       => $faker->unique()->isbn13,
                    'summary'    => $faker->paragraph(3),
                    'added_date' => $faker->dateTimeThisYear(),
                    'read_count' => $faker->numberBetween(0, 100),
                ]);

                $book->user()->associate($user);

                $book->save();
            }
        }
    }
}
