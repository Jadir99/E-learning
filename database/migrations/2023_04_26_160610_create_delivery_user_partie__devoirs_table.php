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
        Schema::create('delivery_user_partie__devoirs', function (Blueprint $table) {
            $table->id();
            $table->string('path_travail')->nullable();
            $table->date('date_remise');
            $table->decimal('note_devoir');

            
            

            
            $table->unsignedBigInteger('partie_id');
            $table->foreign('partie_id')->references('id')->on('parties')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('devoir_id');
            $table->foreign('devoir_id')->references('id')->on('devoirs')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('delivery_user_partie__devoirs');
    }
};
