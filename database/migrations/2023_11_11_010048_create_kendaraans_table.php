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
        Schema::create('kendaraans', function (Blueprint $table) {
            $table->id();
            $table->string('image_path')->nullable();
            $table->string('model');
            $table->integer('tahun');
            $table->integer('jumlah_penumpang');
            $table->string('manufaktur');
            $table->decimal('harga', 12, 2);
            $table->morphs('jenis_kendaraan');
            $table->timestamps();
        });

        Schema::table('kendaraans', function (Blueprint $table) {
            $table->string('jenis_kendaraan_id')->nullable()->change();
            $table->string('jenis_kendaraan_type')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kendaraans');
    }
};
