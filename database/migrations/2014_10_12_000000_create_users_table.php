<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('role_id')->default(2);
            $table->tinyInteger('user_banned')->default(0);
            $table->string('last_seen')->nullable();
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('provider_id')->nullable();
            $table->string('image')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([
            'name' => 'Admin' ,
            'role_id' => '1',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('11111111'),
        ]);
        DB::table('users')->insert([
            'name' => 'User' ,
            'role_id' => '2',
            'email' => 'user@gmail.com',
            'password' => Hash::make('11111111'),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
