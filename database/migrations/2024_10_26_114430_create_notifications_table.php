<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title'); // Title of the notification
            $table->text('scroller_icon')->nullable(); // Scroller icon (PNG)
            $table->text('scroller_notification')->nullable(); // Make this nullable if needed
            $table->text('scroller_link'); // Scroller notification link
            $table->text('guideline_document')->nullable(); // Document (PDF)
            $table->text('description'); // Description of the notification
            $table->text('contact_description'); // Contact details description
            $table->string('email')->unique(); // Email address
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
        Schema::dropIfExists('notifications');
    }
}
