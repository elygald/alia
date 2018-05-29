<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('answers', function(Blueprint $table) {
			$table->foreign('lead_id')->references('id')->on('leads')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('answers', function(Blueprint $table) {
			$table->foreign('qualification_question_id')->references('id')->on('qualification_questions')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('leads', function(Blueprint $table) {
			$table->foreign('order_id')->references('id')->on('orders')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('feedbacks', function(Blueprint $table) {
			$table->foreign('order_id')->references('id')->on('orders')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('qualification_questions', function(Blueprint $table) {
			$table->foreign('service_id')->references('id')->on('services')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
	}

	public function down()
	{
		Schema::table('answers', function(Blueprint $table) {
			$table->dropForeign('answers_lead_id_foreign');
		});
		Schema::table('answers', function(Blueprint $table) {
			$table->dropForeign('answers_qualification_question_id_foreign');
		});
		Schema::table('leads', function(Blueprint $table) {
			$table->dropForeign('leads_order_id_foreign');
		});
		Schema::table('feedbacks', function(Blueprint $table) {
			$table->dropForeign('feedbacks_order_id_foreign');
		});
		Schema::table('qualification_questions', function(Blueprint $table) {
			$table->dropForeign('qualification_questions_service_id_foreign');
		});
	}
}