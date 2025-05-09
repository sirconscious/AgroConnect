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
        Schema::table('farms', function (Blueprint $table) {
            $table->string("farmerCertificate")->nullable();  
            $table->string("nationalId")->nullable();
            $table->string("landDocument")->nullable();
            $table->string("oncaAttestation")->nullable();
            $table->string("agriculturalRegisters")->nullable();
            $table->string("farmDetailsDoc")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('farms', function (Blueprint $table) {
            $table->dropColumn("farmerCertificate");
            $table->dropColumn("nationalId");
            $table->dropColumn("landDocument");
            $table->dropColumn("oncaAttestation");
            $table->dropColumn("agriculturalRegisters");
            $table->dropColumn("farmDetailsDoc");
        });
    }
};
