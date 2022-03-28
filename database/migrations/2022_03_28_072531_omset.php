<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class Omset extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('CREATE EXTENSION IF NOT EXISTS "uuid-ossp";');
        Schema::create('omset', function (Blueprint $table) {
            $table->uuid('omset_id')->primary();
            $table->uuid('usaha_id')->nullable();
            $table->string('nominal')->nullable();
            $table->string('pajak')->nullable();
            $table->timestamps();
        });
        DB::statement('ALTER TABLE omset ALTER COLUMN omset_id SET DEFAULT uuid_generate_v4();');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('omset');
    }
}
