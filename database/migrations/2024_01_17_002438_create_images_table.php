<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->string('title')->default('Untitled');
            $table->text('description')->nullable();
            $table->string('url');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->enum('status', ['draft', 'published'])->default('draft'); // Menambahkan kolom status
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Menambahkan kolom user_id
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('images');
    }
}
