<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/*
 * Раніше міграції були представлені звичайними класами, а тепер — анонімними.
 */
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    /*
     * Метод up() призначений для створення таблиці або змін в таблиці.
     * Blueprint допомагає будувати таблиці.
     * CREATE TABLE users
     * (
     *  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL
     *  name VARCHAR NOT NULL (тому що не nullable())
     *  email VARCHAR UNIQUE NOT NULL
     *  email_verified_at
     *  password
     *  (?)
     *  created_at
     *  updated_at
     * )
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 35);
            $table->string('lastname', 50);
            $table->string('email')->unique();
            $table->string('phone', 15)->unique();
            $table->date('birthdate');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    /*
     * Метод down() призначений для видалення таблиці або для відкачування змін в таблиці.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
