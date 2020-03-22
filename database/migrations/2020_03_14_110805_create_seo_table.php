<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seo', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('path', 500)
                ->index();
            $table->string('og_type', 50);
            $table->string('og_url', 500);
            $table->string('og_image', 500);
            $table->string('twitter_card', 50);
            $table->string('robots', 50);
            $table->string('author', 50);
            $table->string('keywords', 200);
            $table->string('title', 100);
            $table->string('description', 500);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seo');
    }
}
