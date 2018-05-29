<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAnswersTable extends Migration {

	public function up()
	{
		Schema::create('answers', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('lead_id')->unsigned();
			$table->integer('qualification_question_id')->unsigned();
			$table->string('value');
		});
	}

	public function down()
	{
		Schema::drop('answers');
	}
}