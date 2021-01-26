<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeekerProfilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('seeker_profiles', function(Blueprint $table)
		{
			$table->integer(''id'', true);
			$table->string(''name'', 150)->nullable();
			$table->string(''title'', 150)->nullable();
			$table->string(''location'', 250)->nullable();
			$table->string('description')->nullable();
			$table->string(''profile_image'', 250)->nullable();
			$table->string(''mobile'', 15)->nullable();
			$table->string(''email'', 150)->nullable();
			$table->timestamps(10);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('seeker_profiles');
	}

}
