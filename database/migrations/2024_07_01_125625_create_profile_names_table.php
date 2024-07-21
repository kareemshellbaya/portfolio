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
        Schema::create('profile_names', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users' , 'id')
                  ->cascadeOnDelete()->cascadeOnUpdate();
            $table->Integer('age')->unsigned()->nullable();
            $table->string('birthday')->default('26 February 1988');
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('address')->default('8 Samy Shellbaya st Beside Omar Affendi in front of Shellbaya mosque');
            $table->string('github')->nullable();
            $table->string('telegram')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('skype')->nullable();
            $table->string('website')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile_names');
    }
};


