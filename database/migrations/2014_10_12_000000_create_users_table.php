<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('CREATE EXTENSION IF NOT EXISTS "uuid-ossp";');
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('user_id')->primary();
            $table->uuid('role_id')->nullable();
            $table->string('no_identitas')->nullable();
            $table->string('nama')->nullable();
            $table->string('jk')->nullable();
            $table->string('no_hp', 15)->nullable();
            $table->string('alamat')->nullable();
            $table->string('npwp', 16)->nullable();
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->string('foto')->nullable();
            $table->timestamps();
        });
        DB::statement('ALTER TABLE users ALTER COLUMN user_id SET DEFAULT uuid_generate_v4();');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
