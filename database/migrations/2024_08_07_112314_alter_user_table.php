<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('division_head_status_one')->default(0);
            $table->boolean('division_head_status_two')->default(0);
            $table->boolean('division_head_status_three')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('division_head_status_one')->default(0);
            $table->boolean('division_head_status_two')->default(0);
            $table->boolean('division_head_status_three')->default(0);
        });
    }
}