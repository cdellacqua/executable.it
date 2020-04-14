<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterSeoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('seo', function (Blueprint $table) {
            $table->string('og_image', 500)->nullable()->change();
            $table->string('og_image_width', 50)->nullable()->change();
            $table->string('og_image_height', 50)->nullable()->change();
            $table->string('twitter_card', 50)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('seo', function (Blueprint $table) {
            $table->string('og_image', 500)->nullable(false)->change();
            $table->string('og_image_width', 50)->nullable(false)->change();
            $table->string('og_image_height', 50)->nullable(false)->change();
            $table->string('twitter_card', 50)->nullable(false)->change();
        });
    }
}
