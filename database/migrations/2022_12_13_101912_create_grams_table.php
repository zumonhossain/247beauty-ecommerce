<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grams', function (Blueprint $table) {
            $table->id();
            $table->string('gram_name')->nullable();
            $table->string('gram_slug')->nullable();
            $table->integer('gram_creator')->nullable();
            $table->integer('gram_status')->default(1);
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
        Schema::dropIfExists('grams');
    }
}
