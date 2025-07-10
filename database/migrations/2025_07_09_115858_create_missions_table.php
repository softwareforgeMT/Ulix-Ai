<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMissionsTable extends Migration
{
    public function up(): void
    {
        Schema::create('missions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('requester_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('subcategory_id');
            $table->unsignedBigInteger('subsubcategory_id');
            $table->string('title');
            $table->text('description');
            $table->decimal('budget_min', 10, 2)->nullable();
            $table->decimal('budget_max', 10, 2)->nullable();
            $table->string('budget_currency', 3)->default('EUR');
            $table->string('service_durition')->nullable();
            $table->string('location_country')->nullable();
            $table->string('location_city', 100)->nullable();
            $table->boolean('is_remote')->default(false);
            $table->string('language')->nullable();
            $table->enum('urgency', ['low', 'medium', 'high', 'urgent'])->default('medium');
            $table->enum('status', ['draft', 'published', 'in_progress', 'completed', 'cancelled', 'disputed'])->default('published');
            $table->unsignedBigInteger('selected_provider_id')->nullable();
            $table->enum('payment_status', ['unpaid', 'paid', 'held', 'released', 'refunded'])->default('unpaid');
            $table->boolean('is_fake')->default(false);
            $table->json('attachments')->nullable(); 

            $table->timestamps();

            // Foreign Keys
            $table->foreign('requester_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('subcategory_id')->references('id')->on('categories');
            $table->foreign('selected_provider_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('missions');
    }
}
