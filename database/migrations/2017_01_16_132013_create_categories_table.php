<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('categories', function(Blueprint $table)
		{
			$table->increments('id_categorie');
			$table->string('categorie', 256)->unique('categorie_UNIQUE');
			$table->string('slug', 256)->unique('slug_UNIQUE');
			$table->text('description', 65535)->nullable();
			$table->integer('id_type_categorie')->unsigned()->index('fk_type_categorie_idx');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('categories');
	}

}
