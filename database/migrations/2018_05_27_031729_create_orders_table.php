<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdersTable extends Migration {

	public function up()
	{
		Schema::create('orders', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->datetime('due_date')->nullable();
			$table->integer('status');
			$table->decimal('amount', 10, 2)->nullable();
			$table->jsonb('comments');
		});
	}

	public function down()
	{
		Schema::drop('orders');
	}
}