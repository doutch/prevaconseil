<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToProfilsDemandeurEmploiTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('profils_demandeur_emploi', function(Blueprint $table)
		{
			$table->foreign('id_user', 'fk_users_profils_demandeur_emploi_1')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('profils_demandeur_emploi', function(Blueprint $table)
		{
			$table->dropForeign('fk_users_profils_demandeur_emploi_1');
		});
	}

}
