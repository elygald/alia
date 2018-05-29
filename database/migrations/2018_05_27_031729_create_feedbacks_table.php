<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFeedbacksTable extends Migration {

	public function up()
	{
		Schema::create('feedbacks', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('order_id')->unsigned();
			$table->text('comment');
			$table->integer('score');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('feedbacks');
	}
}