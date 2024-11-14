<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        if (! Schema::hasTable('sc_traffic_suppliers')) {
            Schema::create('sc_traffic_suppliers', function (Blueprint $table) {
                $table->id();
                $table->string('name', 255);
                $table->string('url', 255)->nullable();
                $table->string('login', 255)->nullable();
                $table->string('password', 255)->nullable();
                $table->bigInteger('credits')->default(0);
                $table->boolean('is_active')->default(false);
                $table->timestamps();
                $table->softDeletes();
            });
        }

        if (! Schema::hasTable('sc_traffic_suppliers_translations')) {
            Schema::create('sc_traffic_suppliers_translations', function (Blueprint $table) {
                $table->string('lang_code');
                $table->foreignId('traffic_suppliers_id');
                $table->string('name', 255)->nullable();

                $table->primary(['lang_code', 'traffic_suppliers_id'], 'traffic_suppliers_translations_primary');
            });
        }
    }

    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('sc_traffic_suppliers');
        Schema::dropIfExists('sc_traffic_suppliers_translations');
    }
};
