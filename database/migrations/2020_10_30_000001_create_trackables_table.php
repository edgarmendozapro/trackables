<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrackablesTable extends Migration
{
    public function up()
    {
        Schema::create('trackables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table
                ->bigInteger('user_id')
                ->unsigned()
                ->nullable();
            $table->morphs('trackable');
            $table->ipAddress('ip');
            $table->string('type'); // visualized, cta
            $table->string('from')->nullable();
            $table->integer('position')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('trackables');
    }
}
