<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCustomersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('customers', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->string('company_name');
			$table->string('name')->nullable();
			$table->string('title')->nullable();
			$table->string('attn_name')->nullable();
			$table->string('address_line_1')->nullable();
			$table->string('address_line_2')->nullable();
			$table->string('city')->nullable();
			$table->string('state')->nullable();
			$table->string('zip')->nullable();
			$table->string('country')->nullable();
			$table->string('telephone')->nullable();
			$table->string('fax')->nullable();
			$table->string('website')->nullable();
			$table->integer('fee_percentage')->nullable();
			$table->string('fee_flat')->nullable();
			$table->integer('sales_id')->nullable();
			$table->string('sales_percentage')->nullable();
			$table->integer('affiliate_id')->nullable();
			$table->integer('verified')->default(0);
			$table->integer('enabled')->default(1);
			$table->timestamps();

			$table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('customers');
	}

}
