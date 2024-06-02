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
        Schema::create('estates', function (Blueprint $table) {
            $table->id();

            $table->string('title');                  // Villa for sale
            $table->string('slug');                   // villa-for-sale
            $table->integer('category');              // Villa
            $table->integer('purpose');               // For sale
            $table->integer('sponsored');             // Yes | No
            $table->integer('published')->default(0);             // Yes | No
            $table->string('address')->nullable();
            $table->integer('city');                  // 1.  Sarajevo
            $table->integer('country');               // 21. Bosnia and Herzegovina

            $table->string('price')->default('0.00');
            $table->string('sale_price')->nullable();

            $table->string('surface')->default('0.00');
            $table->string('bedrooms')->default(0);
            $table->string('bathrooms')->default(0);
            $table->string('garages')->default(0);
            $table->string('built')->default(2000);     // year of building

            $table->text('description')->nullable();          // Detailed description
            $table->string('video')->nullable();              // Link to video

            /* Google map */
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();

            /* Cover image - main image */
            $table->string('image')->nullable();

            $table->integer('created_by');                    // User that inserted estate

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estates');
    }
};
