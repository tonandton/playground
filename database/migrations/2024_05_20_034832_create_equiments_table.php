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
        Schema::create('equiments', function (Blueprint $table) {
            $table->id();

            $table->string("code_id", 11)->nullable();
            $table->string("name");
            $table->longText("description")->nullable();
            $table->string("responsible_name")->nullable();
            $table->string("phone", 10)->nullable();
            $table->string('status')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equiments');
    }
};
