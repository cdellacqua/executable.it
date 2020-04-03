<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('remote_address', 50);
            $table->string('session', 200);
            $table->string('http_version', 20);
            $table->string('method', 10);
            $table->string('url', 2000);
            $table->json('headers');
            $table->string('locale',10);
            $table->integer('processing_time_ms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log');
    }
}
