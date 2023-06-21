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
        Schema::create('audits', function (Blueprint $table) {
            $table->id();
            $table->string('AuditName');
            $table->string('AuditType');
            $table->string('AuditStatus');
            $table->string('AuditFrequency');
            $table->string('AuditDeadline')->nullable();
            $table->string('AuditPriority');
            $table->string('AuditSlug');
            $table->boolean('isPinned')->default(false);
            $table->dateTime('start_date');
            $table->date('end_date');
            $table->string('Completed_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('audits');
    }
};
