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
        Schema::create('blog', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('slug');
            $table->text('short_desc');
            $table->text('content');
            $table->integer('category');
            $table->integer('image')->nullable();
            $table->tinyInteger('published')->default(0);
            $table->integer('created_by');

            $table->integer('visits')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog');
    }
};
