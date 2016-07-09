<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableFamilyInvites extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('family_invites', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('from')->index();
            $table->integer('to')->index();
            $table->string('relation', 100)->nullable();
            $table->boolean('pending');
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
        Schema::drop('family_invites');
    }
}
