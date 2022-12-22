<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopNoticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('top_notics', function (Blueprint $table) {
            $table->bigIncrements('notice_id');
            $table->string('notice_name')->nullable();
            $table->string('notice_slug')->nullable();
            $table->integer('notice_status')->default(1);
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
        Schema::dropIfExists('top_notics');
    }
}
