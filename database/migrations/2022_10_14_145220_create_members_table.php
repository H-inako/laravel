<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('members', function(Blueprint $table)
		{
			$table->integer('id', true)->comment('会員ID');
			$table->string('name_sei')->comment('氏名（姓）');
			$table->string('name_mei')->comment('氏名（名）');
			$table->string('nickname')->comment('ニックネーム');
			$table->integer('gender')->comment('性別（1=男性、２=女性）');
			$table->string('password')->comment('パスワード');
			$table->string('email')->comment('メールアドレス');
			$table->integer('auth_code')->nullable()->comment('認証コード');
			$table->timestamps(10);
			$table->softDeletes()->comment('削除日時');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('members');
	}

}
