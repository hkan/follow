<?php

use Hkan\Follow\Facades\Follow;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class HkanFollowCreateUserFollowsTable
 */
class HkanFollowCreateUserFollowsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create(Follow::pivotTable(), function (Blueprint $table)
		{
			$table->increments('id');

			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on(Follow::usersTable())
				->onUpdate('cascade')->onDelete('cascade');

			$table->integer('follow_id')->unsigned();
			$table->foreign('follow_id')->references('id')->on(Follow::usersTable())
				->onUpdate('cascade')->onDelete('cascade');

			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop(Follow::pivotTable());
	}

}
