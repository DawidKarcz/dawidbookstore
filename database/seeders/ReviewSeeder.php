<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Review;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $review = new Review();
      $review->title = "Good Book";
      $review->body = "Great read. I enjoyed it.";
      $review->user_id = 2;
      $review->book_id = 2;
      $review->save();

      $review = new Review();
      $review->title = "Nice Book";
      $review->body = "Great read!!!. I enjoyed it.";
      $review->user_id = 3;
      $review->book_id = 3;
      $review->save();

      $review = new Review();
      $review->title = "Not bad";
      $review->body = "I enjoyed it.";
      $review->user_id = 4;
      $review->book_id = 5;
      $review->save();

    }
}
