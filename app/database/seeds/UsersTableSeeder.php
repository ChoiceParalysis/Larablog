<?php

use Faker\Factory;

class UsersTableSeeder extends Seeder
{
	
	public function run()
	{
		DB::table('users')->truncate();

		$faker = Factory::create();

		User::create([
			'username' => $faker->name,
			'email' => $faker->email,
			'bio' => $faker->paragraph(4),
			'password' => $faker->word,
			'remember_token' => false
		]);

		User::create([
			'username' => 'Jake',
			'email' => 'jake@doe.com',
			'bio' => $faker->paragraph(4),
			'password' => '1234',
			'remember_token' => false
		]);

		User::create([
			'username' => 'John',
			'email' => 'jake@doe.com',
			'bio' => $faker->paragraph(4),
			'password' => '1234',
			'remember_token' => false
		]);

		User::create([
			'username' => 'Mike',
			'email' => 'jake@doe.com',
			'bio' => $faker->paragraph(4),
			'password' => '1234',
			'remember_token' => false
		]);
	}

}