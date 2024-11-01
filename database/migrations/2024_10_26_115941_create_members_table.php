<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('order_id'); // Order ID field
            $table->string('name'); // Member name
            $table->string('qualification'); // Qualification
            $table->string('institution'); // Institution
            $table->string('designation'); // Designation
            $table->string('affiliation')->nullable(); // Affiliation
            $table->string('status')->default('active'); // Status field
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}
