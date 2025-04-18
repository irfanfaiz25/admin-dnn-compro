<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('series', 20);
            $table->boolean('stock')->default(true);
            $table->text('description');
            $table->string('racikan', 50);
            $table->string('karakter', 50);
            $table->string('rempah', 50);
            $table->integer('kemasan');
            $table->string('detailImage');
            $table->string('packImage');
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
