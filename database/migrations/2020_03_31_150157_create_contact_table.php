<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('locale', 10);
            $table->string('first_name', 100);
            $table->string('last_name', 100);
            $table->string('email', 100);
            $table->string('phone', 100)->nullable();
            $table->text('message');
            $table->timestamp('privacy_granted')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('privacy_revoked')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact');
    }
}
