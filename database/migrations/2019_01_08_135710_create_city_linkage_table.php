<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCityLinkageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('city_linkage', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->smallInteger('parent_id');
            $table->string('pinyin');
            $table->string('initial');
            $table->string('initials');
            $table->string('suffix');
            $table->string('code');
            $table->string('order');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('city_linkage');
    }
}
