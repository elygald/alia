<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQualificationQuestionsTable extends Migration {

	public function up()
	{
		Schema::create('qualification_questions', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('service_id')->unsigned();
			$table->string('description');
			$table->smallInteger('type');
			$table->smallInteger('order')->unique();
			$table->timestamps();
			$table->softDeletes();
			$table->jsonb('options');
		});
	}

	public function down()
	{
		Schema::drop('qualification_questions');
	}
}