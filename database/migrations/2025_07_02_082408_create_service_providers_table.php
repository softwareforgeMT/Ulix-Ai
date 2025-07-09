<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceProvidersTable extends Migration
{
    public function up(): void
    {
        Schema::create('service_providers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('native_language')->nullable();
            $table->json('spoken_language')->nullable();
            $table->text('services_to_offer')->nullable();
            $table->text('provider_address')->nullable();
            $table->text('operational_countries')->nullable(); 
            $table->boolean('communication_online')->nullable();
            $table->boolean('communication_inperson')->nullable();
            $table->text('profile_description')->nullable();
            $table->string('profile_photo')->nullable();
            $table->string('provider_docs')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('country')->nullable();
            $table->string('preferred_language')->nullable();
            $table->json('special_status')->nullable(); 
            $table->string('email')->unique()->nullable();
            $table->json('documents')->nullable(); 
            $table->ipAddress('ip_address')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('service_providers');
    }
}

