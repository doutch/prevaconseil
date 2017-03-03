<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTypeFichiersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('type_fichiers', function(Blueprint $table)
		{
			$table->increments('id_type_fichier');
			$table->string('nom', 45)->unique('nom_UNIQUE');
			$table->string('type_fichier', 45)->unique('type_fichier_UNIQUE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('type_fichiers');
	}

}
