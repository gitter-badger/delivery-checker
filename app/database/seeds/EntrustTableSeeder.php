<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class EntrustTableSeeder extends Seeder {

	public function run()
	{
		$admin = Role::find(1);
		$customer = Role::find(2);
		$superAdmin = Role::find(3);


		$read = Permission::find(1);


		$admin->attachPermission($read);
		$customer->attachPermission($read);
		$superAdmin->attachPermission($read);

		$user1 = User::find(1);
		$user2 = User::find(2);
		$user3 = User::find(3);


		$user1->attachRole($admin);
		$user2->attachRole($customer);
		$user3->attachRole($superAdmin);



	}

}