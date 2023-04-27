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
        Schema::create('prendre_course_users', function (Blueprint $table) {
            $table->id();
            $table->date('date_review');
            $table->decimal('review');

            
            $table->unsignedBigInteger('id_course');
            $table->foreign('id_course')->references('id')->on('courses')->onUpdate('cascade')->onDelete('cascade');


            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prendre_course_users');
    }
};
