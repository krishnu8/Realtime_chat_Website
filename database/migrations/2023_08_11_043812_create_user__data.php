<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user__data', function (Blueprint $table) {
            $table->id('User_id');
            $table->timestamps();
            $table->string('Name');
            $table->string('Email')->unique();
            $table->string('Password');
            $table->string('Address')->nullable(true);
            $table->string('Gender')->nullable(true);
            $table->string('D/O/B')->nullable(true);
            $table->string('Bio')->nullable(true);
            $table->string('Picture')->default('Deafult.png');
            $table->string('Status')->default('Active');
            $table->string('Privacy')->default('Public');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user__data');
    }
};