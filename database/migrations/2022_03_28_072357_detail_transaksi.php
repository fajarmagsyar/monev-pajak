<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class DetailTransaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('CREATE EXTENSION IF NOT EXISTS "uuid-ossp";');
        Schema::create('detail_transaksi', function (Blueprint $table) {
            $table->uuid('detail_transaksi_id')->primary();
            $table->uuid('transaksi_id')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
        DB::statement('ALTER TABLE detail_transaksi ALTER COLUMN detail_transaksi_id SET DEFAULT uuid_generate_v4();');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_transaksi');
    }
}
