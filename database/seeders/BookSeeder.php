<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $books = [
            ['title' => 'Book One', 'author' => 'Author One', 'pages' => 300, 'downloads' => 150, 'field' => 'Fiction', 'publication_date' => '2020-01-01'],
            ['title' => 'Book Two', 'author' => 'Author Two', 'pages' => 200, 'downloads' => 250, 'field' => 'Non-Fiction', 'publication_date' => '2019-05-15'],
            ['title' => 'Book Three', 'author' => 'Author Three', 'pages' => 400, 'downloads' => 100, 'field' => 'Science', 'publication_date' => '2021-07-20'],
            ['title' => 'Book Four', 'author' => 'Author Four', 'pages' => 350, 'downloads' => 180, 'field' => 'History', 'publication_date' => '2018-11-10'],
            ['title' => 'Book Five', 'author' => 'Author Five', 'pages' => 450, 'downloads' => 300, 'field' => 'Technology', 'publication_date' => '2022-03-05'],
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}
