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
        Schema::create('address', function (Blueprint $table) {
            $table->id();
            $table->string('city');
            $table->string('state');
            $table->string('address');
            $table->string('pincode');
            $table->unsignedBigInteger('user_id'); // Foreign key column
            $table->timestamps();

            $table->foreign('user_id')
            ->references('id')
            ->on('registers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('address');
    }
};
