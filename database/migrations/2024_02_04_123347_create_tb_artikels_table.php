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
        Schema::create('tb_artikels', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('link');
            $table->string('judul_artikel');
            $table->text('isi_artikel');
            $table->string('nama_resto');
            $table->enum('status_publish',['jakarta', 'kalsel']);
            // $table->foreign('user_id')->references('id')->on('user')->nullable()->onDelete('cascade'); // Tambahkan foreign key constraint            
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_artikels');
    }
};
