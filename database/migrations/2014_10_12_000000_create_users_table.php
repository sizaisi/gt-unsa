<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('dni', 8)->unique()->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('role')->nullable();
            $table->string('poster')->nullable();
            $table->string('estado', 50)->nullable();
            $table->string('caja', 20)->nullable();
            $table->string('current_team_id')->nullable();
            $table->text('profile_photo_path')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([
            [
                'name' => 'Renzo',                
                'email' => 'renzosiza7@gmail.com',
                'password' => '$2y$10$iWpGEsVCi2Sml9NQuOWIMustHPXE3yEE/ImdUj2u4LIpk3YjzPySC',
                'role' => 'ADMIN',                           
            ],            
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
