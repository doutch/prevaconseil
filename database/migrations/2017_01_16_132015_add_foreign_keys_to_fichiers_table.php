<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToFichiersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('fichiers', function(Blueprint $table)
		{
			$table->foreign('id_type_fichier', 'fk_fichier_type_fichier')->references('id_type_fichier')->on('type_fichiers')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('id_user', 'fk_user_fichier')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('fichiers', function(Blueprint $table)
		{
			$table->dropForeign('fk_fichier_type_fichier');
			$table->dropForeign('fk_user_fichier');
		});
	}

}
