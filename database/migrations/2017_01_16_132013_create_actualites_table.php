<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateActualitesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('actualites', function(Blueprint $table)
		{
			$table->increments('id_actualite');
			$table->string('titre');
			$table->string('slug');
			$table->text('contenu', 65535);
			$table->boolean('active')->nullable()->default(0);
			$table->integer('id_user')->unsigned()->index('fk_user_actualite_idx');
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
		Schema::drop('actualites');
	}

}
