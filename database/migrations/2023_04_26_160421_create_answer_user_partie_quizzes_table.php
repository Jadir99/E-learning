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

            
            $table->unsignedBigInteger('partie_id');
            $table->foreign('partie_id')->references('id')->on('parties')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('quiz_id');
            $table->foreign('quiz_id')->references('id')->on('quizzes')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

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
