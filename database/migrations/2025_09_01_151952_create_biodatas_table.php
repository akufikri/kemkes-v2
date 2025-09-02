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
        Schema::create('biodatas', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('no_document')->nullable(); // ini untuk barcode number
            $table->string('patient_name')->nullable();
            $table->enum('sex', ['MALE', 'FEMALE'])->nullable();
            $table->date('date_of_birth');
            $table->string('nationality');
            $table->string('nationality_doc');
            $table->string('disease')->nullable();
            $table->string('facility')->nullable();
            $table->unsignedBigInteger('id_type_document');
            $table->boolean('status')->default(1);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biodatas');
    }
};
