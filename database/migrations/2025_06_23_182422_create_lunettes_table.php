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
        Schema::create('lunettes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('price');
            $table->text('description');
            /** Create another table SIZE to contains size property 
             * like 
             * $table->string('frameWidth');
             * $table->string('lensWidth');
             * $table->string('bridgeWidth');
             * $table->string('templeWidth');
             * This table under is not fixe
            */
            $table->string('size');
            /**
             * Create another table color to contains all color
             * This table under is not fixe
             */
            $table->string('couleur');
            /**
             * Create another table type to contains all type
             * like 
             * $table->string('typeSun');
             * $table->string('typeOptical');
             * This table under is not fixe
             */
            $table->integer('quantity');
            /**
             * Create another table Image to contains all type
             * like 
             * $table->string('image1');
             * $table->string('image2');
             * etc
             * This table under is not fixe
             */
            $table->string('imageGlasses',2048);


            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lunettes');
    }
};
