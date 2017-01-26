<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTypeCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('type_categories', function(Blueprint $table)
		{
			$table->increments('id_type_categorie');
			$table->string('type_categorie', 256)->unique('type_categorie_UNIQUE');
			$table->string('slug', 256)->unique('slug_UNIQUE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('type_categories');
	}

}
