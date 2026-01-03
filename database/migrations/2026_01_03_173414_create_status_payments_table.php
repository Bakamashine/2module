<?php

use App\StatusPayment;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('status_payments', function (Blueprint $table) {
            $table->id();
            $table->enum("status", StatusPayment::cases());
            $table->foreignId("student_id")->constrained("students")->cascadeOnDelete();
            $table->foreignId("course_id")->constrained("courses")->cascadeOnDelete();
            $table->timestamp("created_at");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('status_payments');
    }
};
