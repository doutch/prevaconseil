<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAnnoncesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('annonces', function(Blueprint $table)
		{
			$table->increments('id_annonce');
			$table->string('titre');
			$table->string('slug');
			$table->text('contenu', 65535);
			$table->boolean('active')->nullable()->default(0);
			$table->integer('id_user')->unsigned()->index('id_user');
			$table->timestamps();
			$table->integer('id_type_annonce')->unsigned()->index('fk_type_annonces_idx');
			$table->integer('id_categorie')->unsigned()->index('fk_type_categorie_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('annonces');
	}

}
