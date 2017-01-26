<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProfilsDemandeurEmploiTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('profils_demandeur_emploi', function(Blueprint $table)
		{
			$table->integer('id_profil')->unsigned()->primary();
			$table->string('nom')->nullable();
			$table->string('prenom')->nullable();
			$table->string('telephone')->nullable();
			$table->date('date_naissance')->nullable();
			$table->text('adresse', 65535)->nullable();
			$table->string('photo')->nullable();
			$table->timestamps();
			$table->integer('id_user')->unsigned()->index('fk_users_profils_demandeur_emploi_1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('profils_demandeur_emploi');
	}

}
