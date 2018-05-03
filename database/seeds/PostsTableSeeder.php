// /database/migrations/seeds/PostsTableSeeder.php
<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder {

    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('posts')->delete();
        DB::table('comments')->delete();

        $posts = array(
            ['id' => 1, 'user_id' => 1, 'name' => 'Suprise Spew - Marvel Heroes: 2015', 'content' => 'Lorem Ipsum ...', 'slug' => 'surprise-spew-marvel-heroes-2015-why-a-bad-launch-isnt-the-nail-in-the-coffin', 'created_at' => new DateTime, 'updated_at' => new DateTime, 'seo_title' => 'surprise-spew-marvel-heroes-2015-why-a-bad-launch-isnt-the-nail-in-the-coffin', 'seo_description' => 'seo description', 'seo_keywords' => 'seo keywords'],
            ['id' => 2, 'user_id' => 2, 'name' => 'Magic The Gathering: 2015', 'content' => 'Lorem Ipsum ...', 'slug' => 'magic-2015', 'created_at' => new DateTime, 'updated_at' => new DateTime, 'seo_title' => 'magic-2015', 'seo_description' => 'seo description', 'seo_keywords' => 'seo keywords'],
            ['id' => 3, 'user_id' => 2, 'name' => 'DOTA 2 Console & Launch Options', 'content' => 'Lorem Ipsum ...', 'slug' => 'dota2-console-and-launch-options', 'created_at' => new DateTime, 'updated_at' => new DateTime, 'seo_title' => 'dota2-console-and-launch-options', 'seo_description' => 'seo description', 'seo_keywords' => 'seo keywords'],
            ['id' => 4, 'user_id' => 3, 'name' => 'Playing Cops and Robbers', 'content' => 'Lorem Ipsum ...', 'slug' => 'battlefield-hardline', 'created_at' => new DateTime, 'updated_at' => new DateTime, 'seo_title' => 'battlefield-hardline', 'seo_description' => 'seo description', 'seo_keywords' => 'seo keywords'],
        );

        $comments = array(
          ['id' => 1, 'post_id' => 1, 'user_id' => 1, 'content' => 'Comment one.', 'likes' => 30, 'dislikes' => 2, 'created_at' => new DateTime, 'updated_at' => new DateTime],
          ['id' => 2, 'post_id' => 1, 'user_id' => 1, 'content' => 'Comment two.', 'likes' => 50, 'dislikes' => 500, 'created_at' => new DateTime, 'updated_at' => new DateTime],
          ['id' => 3, 'post_id' => 1, 'user_id' => 1, 'content' => 'Comment one.', 'likes' => 20, 'dislikes' => 13, 'created_at' => new DateTime, 'updated_at' => new DateTime],
        );
        // Uncomment the below to run the seeder
        DB::table('posts')->insert($posts);
        DB::table('comments')->insert($comments);
    }

}
