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
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->String("title");
            $table->text("body"); 
            $table->timestamps();
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id'); // Thêm cột user_id
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Tạo khóa ngoại liên kết với bảng users
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->timestamp('created_at')->useCurrent()->change();
            $table->timestamp('updated_at')->useCurrent()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};