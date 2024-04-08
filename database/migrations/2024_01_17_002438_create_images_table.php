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
        $table->text('description')->nullable();
        $table->text('tags')->nullable();
        $table->string('location')->nullable();
        $table->string('camera')->nullable(); // Add camera field
        $table->string('url');
        $table->foreignId('category_id')->constrained()->onDelete('cascade');
        $table->enum('status', ['draft', 'published'])->default('draft');
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->timestamps();
    });
}


    public function down()
    {
        Schema::dropIfExists('images');
    }
}
