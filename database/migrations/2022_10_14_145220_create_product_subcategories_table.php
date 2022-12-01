<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductSubcategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_subcategories', function(Blueprint $table)
		{
			$table->integer('id', true)->comment('サブカテゴリID');
			$table->integer('product_category_id')->comment('カテゴリID');
			$table->string('name')->comment('サブカテゴリ名');
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
		Schema::drop('product_subcategories');
	}

}
