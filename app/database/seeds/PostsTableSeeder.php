<?php

use Faker\Factory;

class PostsTableSeeder extends Seeder
{
	
	public function run()
	{
		
		DB::table('posts')->truncate();

		$faker = Factory::create();

		for ($i = 0; $i < 10; $i++){
			Post::create([
				'title' => $faker->sentence(5),
				'body' => $faker->paragraph(rand(3, 5)),
				'category_id' => rand(1, 3),
				'user_id' => rand(1, 3)
			]);
		}

	}

}