<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProBannerThreesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pro_banner_threes', function (Blueprint $table) {
            $table->id();
            $table->string('ban_image')->nullable();
            $table->string('ban_url')->nullable();
            $table->string('ban_slug')->nullable();
            $table->integer('ban_creator')->nullable();
            $table->integer('ban_status')->default(1);
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
        Schema::dropIfExists('pro_banner_threes');
    }
}
