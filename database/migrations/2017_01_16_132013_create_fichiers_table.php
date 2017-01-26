<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFichiersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fichiers', function(Blueprint $table)
		{
			$table->integer('id_fichiers', true);
			$table->string('nom', 45)->unique('nom_UNIQUE');
			$table->string('nom_fichier', 256)->unique('chemin_UNIQUE');
			$table->string('slug', 45)->unique('slug_UNIQUE');
			$table->text('description', 65535)->nullable();
			$table->integer('id_type_fichier')->unsigned()->index('fk_fichier_type_fichier_idx');
			$table->integer('id_user')->unsigned()->index('fk_user_fichier_idx');
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
		Schema::drop('fichiers');
	}

}
