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
            $table->string('path_travail');
            $table->date('date_remise');
            $table->decimal('note_devoir');

            $table->id();
            

            
            $table->unsignedBigInteger('id_partie');
            $table->foreign('id_partie')->references('id')->on('parties')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('id_devoir');
            $table->foreign('id_devoir')->references('id')->on('devoirs')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('delivery_user_partie__devoirs');
    }
};
