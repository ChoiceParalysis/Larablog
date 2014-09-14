<?php

use Faker\Factory;

class CategoriesTableSeeder extends Seeder
{
	
	public function run()
	{
		DB::table('categories')->truncate();
			
		$faker = Factory::create();

		foreach(range(1, 3) as $category)
		{
			Category::create([
				'name' => $faker->word
			]);
		}	
	}

}