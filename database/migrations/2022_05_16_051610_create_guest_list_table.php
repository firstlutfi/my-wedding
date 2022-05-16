<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuestListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guest_list', function (Blueprint $table) {
            $table->string('invitation_code')->primary();
            $table->string('guest_name');
            $table->string('attendance_type');
            $table->string('rsvp');
            $table->integer('max_attendance');
            $table->integer('number_of_attendance');
            $table->text('comments');
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guest_list');
    }
}
