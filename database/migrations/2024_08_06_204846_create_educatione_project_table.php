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
        Schema::create('educatione_project', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('educatione_id');
            $table->unsignedBigInteger('project_id');

            $table->foreign('educatione_id')->references('id')->on('educationes')->onDelete('cascade');

            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('educatione_project');
    }
};
