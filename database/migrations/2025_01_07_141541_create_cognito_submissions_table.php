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
        Schema::create('cognito_submissions', function (Blueprint $table) {
            $table->id();
            $table->string('form_id');
            $table->string('name');
            $table->string('email');
            $table->string('phone')->nullable(); // Add phone column for WhatsApp number
            $table->decimal('amount', 10, 2)->default(0);
            $table->timestamp('submission_date')->nullable();
            $table->json('submission_data');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cognito_submissions');
    }
};
