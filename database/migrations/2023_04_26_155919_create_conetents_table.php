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
        Schema::create('conetents', function (Blueprint $table) {
            $table->id();
            $table->string('type_content');
            $table->string('path_content');
            $table->unsignedBigInteger('partie_id');
            $table->foreign('partie_id')->references('id')->on('parties')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conetents');
    }
};
