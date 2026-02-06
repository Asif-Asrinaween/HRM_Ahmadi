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
        Schema::create('things', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')
                ->constrained()
                ->onDelete('cascade');
            $table->boolean('type');

            $table->string('model');
            $table->integer('amount');
            $table->decimal('unit_price', 10, 2);
            $table->string('model_image')->nullable();
            $table->text('detail')->nullable();
            $table->string('date');
            $table->timestamps();
            $table->softDeletes('deleted_at');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('things');
    }
};
