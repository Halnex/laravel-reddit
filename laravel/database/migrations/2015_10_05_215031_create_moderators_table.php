<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModeratorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moderators', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('subirt_id')->unsigned();
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users');

            $table->foreign('subirt_id')
                ->references('id')
                ->on('subirts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('moderators', function(Blueprint $table) {
            $table->dropForeign('moderators_user_id_foreign');
            $table->dropColumn('user_id');
            $table->dropForeign('moderators_subirt_id_foreign');
            $table->dropColumn('subirt_id');
        });
    }
}
