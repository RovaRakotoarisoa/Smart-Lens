<?php

use App\Models\Lunette;
use App\Models\Type;
use App\Models\Color;
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
            $table->integer('quantity');
            $table->text('description');
            $table->string('frameWidth');
            $table->string('lensWidth');
            $table->string('bridgeWidth');
            $table->string('templeWidth');
            $table->foreignIdFor(Type::class);
            $table->string('primaryimage');
            $table->string('secondaryimage')->nullable();
            $table->string('tertiaryimage')->nullable();
            $table->string('quadriimage')->nullable();
            // $table->timestamp('created_at')->nullable();
        });
        
        Schema::create('lunette_color', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Lunette::class)
                  ->constrained()
                  ->cascadeOnDelete()
                  ->cascadeOnUpdate();
            $table->foreignIdFor(Color::class)
                  ->constrained()
                  ->cascadeOnDelete()
                  ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lunette_color');
        Schema::dropIfExists('lunettes');
    }
};
