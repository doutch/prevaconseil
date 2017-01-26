<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProfilsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('profils', function(Blueprint $table)
		{
			$table->integer('id_profil')->unsigned()->primary();
			$table->string('nom')->nullable();
			$table->string('prenom')->nullable();
			$table->string('telephone')->nullable();
			$table->timestamps();
			$table->integer('id_user')->unsigned()->index('fk_user_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('profils');
	}

}
