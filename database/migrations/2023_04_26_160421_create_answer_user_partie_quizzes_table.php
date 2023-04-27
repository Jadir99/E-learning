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
        Schema::create('answer_user_partie_quizzes', function (Blueprint $table) {
            $table->id();
            $table->date('date_repondre');
            $table->decimal('note_quiz');

            
            $table->unsignedBigInteger('id_partie');
            $table->foreign('id_partie')->references('id')->on('parties')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('id_quiz');
            $table->foreign('id_quiz')->references('id')->on('quizzes')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('answer_user_partie_quizzes');
    }
};
