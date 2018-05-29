<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateIntegrationsTable extends Migration {

	public function up()
	{
		Schema::create('integrations', function(Blueprint $table) {
			$table->increments('id');
			$table->jsonb('config');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('integrations');
	}
}