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
        Schema::create('main_address', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Foreign key column
            $table->unsignedBigInteger('address_id'); // Foreign key column
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('registers');

            $table->foreign('address_id')
                ->references('id')
                ->on('address');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('main_address');
    }
};
