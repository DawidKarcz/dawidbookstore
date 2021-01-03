<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Publisher;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $oreilly = Publisher::where('name', "O'Reilly Media")->first();
      $wrox = Publisher::where('name', "Wrox Press")->first();
      $new_riders = Publisher::where('name', "New Riders")->first();
      $wiley = Publisher::where('name', "John Wiley")->first();

      $book = new Book();
      $book->title = "Learning PHP: A Gentle Introduction to the Web's Most Popular Language";
      $book->author = "David Sklar";
      $book->isbn = "9781491933572";
      $book->price = 41.99;
      $book->year = 2018;
      $book->publisher_id = $oreilly->id;
      $book->save();

      $book = new Book();
      $book->title = "Beginning PHP 5.3";
      $book->author = "Matt Doyle";
      $book->isbn = "9780470413968";
      $book->price = 36.40;
      $book->year = 2018;
      $book->publisher_id = $wrox->id;
      $book->save();

      $book = new Book();
      $book->title = "Beginning JavaScript, 5th Edition";
      $book->author = "Jeremy McPeak";
      $book->isbn = "81118903339";
      $book->price = 40.90;
      $book->year = 2021;
      $book->publisher_id = $wrox->id;
      $book->save();

      $book = new Book();
      $book->title = "Learning JavaScript, 3rd Edition";
      $book->author = "Ethan Brown";
      $book->isbn = "9781491914915";
      $book->price = 39.99;
      $book->year = 2018;
      $book->publisher_id = $oreilly->id;
      $book->save();

      $book = new Book();
      $book->title = "100 Things Every Designer Needs to Know About People";
      $book->author = "Susan Weinschenk";
      $book->isbn = "9780321767530";
      $book->price = 26.31;
      $book->year = 2019;
      $book->publisher_id = $new_riders->id;
      $book->save();

      $book = new Book();
      $book->title = "Smashing CSS: Professional Techniques for Modern Layout";
      $book->author = "Eric Meyer";
      $book->isbn = "9780470684160";
      $book->price = 28.90;
      $book->year = 2018;
      $book->publisher_id = $wiley->id;
      $book->save();

      $book = new Book();
      $book->title = "HTML5: The Missing Manual, 2nd Edition";
      $book->author = "Matthew MacDonald";
      $book->isbn = "9781449363260";
      $book->price = 34.99;
      $book->year = 2018;
      $book->publisher_id = $oreilly->id;
      $book->save();

      $book = new Book();
      $book->title = "Stylin' with CSS: A Designer's Guide, 3rd Edition";
      $book->author = "Charles Wyke-Smith";
      $book->isbn = "9780321858474";
      $book->price = 25.76;
      $book->year = 2021;
      $book->publisher_id = $new_riders->id;
      $book->save();

      $book = new Book();
      $book->title = "Introducing HTML5, 2nd Edition";
      $book->author = "Bruce Lawson";
      $book->isbn = "9780321784421";
      $book->price = 17.95;
      $book->year = 2017;
      $book->publisher_id = $new_riders->id;
      $book->save();

      $book = new Book();
      $book->title = "CSS: The Missing Manual, 4th Edition";
      $book->author = "David Sawyer McFarland";
      $book->isbn = "9781491918050";
      $book->price = 35.72;
      $book->year = 2019;
      $book->publisher_id = $oreilly->id;
      $book->save();

      $book = new Book();
      $book->title = "HTML5 Foundations";
      $book->author = "Matt West";
      $book->isbn = "9781118356555";
      $book->price = 36.55;
      $book->year = 2020;
      $book->publisher_id = $wiley->id;
      $book->save();
    }
}
