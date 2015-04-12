<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CustomersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

			Customer::create([
				'user_id' => User::find(2)->id,
				'company_name' => "LateRefunds",
				'name' => "Rat"
			]);

	}

}