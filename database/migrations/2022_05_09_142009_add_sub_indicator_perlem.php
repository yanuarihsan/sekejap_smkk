<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSubIndicatorPerlem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sub_indicator', function (Blueprint $table) {
            $table->bigInteger('indicator_perlem_id')->unsigned()->after('indicator_id');
            $table->foreign('indicator_perlem_id')->references('id')->on('indicator_perlem');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sub_indicator', function (Blueprint $table) {
            //
        });
    }
}
