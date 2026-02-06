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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('Name');
            $table->string('Phone');
            $table->text('Add');
            $table->string('DateOfJoin');
            $table->string('DateOfSeparate')->nullable();
            $table->unsignedBigInteger('NID');
            $table->text('NidPhoto');
            $table->boolean('Level');
            $table->string('CustRole');
            $table->timestamps();
            $table->softDeletes('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
