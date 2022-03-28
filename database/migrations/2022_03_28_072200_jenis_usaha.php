<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class JenisUsaha extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('CREATE EXTENSION IF NOT EXISTS "uuid-ossp";');
        Schema::create('jenis_usaha', function (Blueprint $table) {
            $table->uuid('jenis_usaha_id')->primary();
            $table->string('nama_jenis_usaha')->nullable();
            $table->timestamps();
        });
        DB::statement('ALTER TABLE jenis_usaha ALTER COLUMN jenis_usaha_id SET DEFAULT uuid_generate_v4();');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jenis_usaha');
    }
}
