<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('legal_products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('type'); // Peraturan Desa, SK, dll
            $table->string('number');
            $table->date('date');
            $table->text('description');
            $table->string('file_path');
            $table->integer('download_count')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('legal_products');
    }
};