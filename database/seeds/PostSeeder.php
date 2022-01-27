<?php

use App\Models\Post;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {

            $post = new Post();
            $post->image = $faker->imageUrl(300, 200, 'Posts');
            $post->title = $faker->sentence(2);
            $post->slug = Str::slug($post->title);
            $post->description = $faker->paragraphs(5, true);
            $post->posted_at = $faker->date();
            $post->save();
        }
    }
}
