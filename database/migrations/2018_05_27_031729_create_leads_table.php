<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLeadsTable extends Migration {

	public function up()
	{
		Schema::create('leads', function(Blueprint $table) {
			$table->increments('id');
			$table->string('chat_id')->nullable();
			$table->integer('order_id')->unsigned()->nullable();
			$table->integer('service_id')->unsigned()->nullable();
			$table->string('name');
			$table->smallInteger('status');
			$table->jsonb('comments');
			$table->jsonb('contacts');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('leads');
	}
}