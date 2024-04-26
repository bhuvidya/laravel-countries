<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountriesTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create(config('countries.table_name'), function (Blueprint $table) {
		    $table->increments('id');
		    $table->string('capital', 255)->nullable();
		    $table->string('citizenship', 255)->nullable();
		    $table->char('country_code', 3)->default('');
		    $table->string('currency', 255)->nullable();
		    $table->string('currency_code', 255)->nullable();
		    $table->string('currency_sub_unit', 255)->nullable();
            $table->string('currency_symbol', 3)->nullable();
            $table->integer('currency_decimals')->nullable();
		    $table->string('full_name', 255)->nullable();
		    $table->char('iso_3166_2', 2)->default('');
		    $table->char('iso_3166_3', 3)->default('');
		    $table->string('name', 255)->default('');
		    $table->char('region_code', 3)->default('');
		    $table->char('sub_region_code', 3)->default('');
		    $table->boolean('eu')->default(0);
		    $table->boolean('eea')->default(0);
		    $table->string('calling_code', 3)->nullable();
		    $table->string('flag', 6)->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop(config('countries.table_name'));
	}

}
