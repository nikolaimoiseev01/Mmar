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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->foreignId('brand_id')->nullable()->constrained();
            $table->foreignId('category_id')->nullable()->constrained();
            $table->foreignId('subcategory_id')->nullable()->constrained();
            $table->json('designers')->nullable();
            $table->string('gender')->nullable();
            $table->text('details');
            $table->text('materials');
            $table->text('aftercare');
            $table->text('manufacturing');
            $table->json('label');
            $table->string('exclusive');

            $table->string('customization_options');
            $table->string('material_focus');
            $table->string('availability');

            $table->float('price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
