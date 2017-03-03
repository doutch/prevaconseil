<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAnnoncesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('annonces', function(Blueprint $table)
		{
			$table->foreign('id_user', 'annonces_ibfk_1')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('id_categorie', 'fk_categorie')->references('id_categorie')->on('categories')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('id_type_annonce', 'fk_type_annonces')->references('id_type_annonce')->on('type_annonces')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('annonces', function(Blueprint $table)
		{
			$table->dropForeign('annonces_ibfk_1');
			$table->dropForeign('fk_categorie');
			$table->dropForeign('fk_type_annonces');
		});
	}

}
