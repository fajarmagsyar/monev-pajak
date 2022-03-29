<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class Usaha extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('CREATE EXTENSION IF NOT EXISTS "uuid-ossp";');
        Schema::create('usaha', function (Blueprint $table) {
            $table->uuid('usaha_id')->primary();
            $table->uuid('user_id')->nullable();
            $table->uuid('jenis_usaha_id')->nullable();
            $table->string('nama_usaha')->nullable();
            $table->string('npwp_usaha', 16)->nullable();
            $table->string('surat_ijin_usaha')->nullable();
            $table->string('surat_ijin_bpom')->nullable();
            $table->string('sertifikat_halal')->nullable();
            $table->timestamps();
        });
        DB::statement('ALTER TABLE usaha ALTER COLUMN usaha_id SET DEFAULT uuid_generate_v4();');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usaha');
    }
}
