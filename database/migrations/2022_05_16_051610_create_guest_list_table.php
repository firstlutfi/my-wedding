<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

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
            $table->string('guest_name')->default('');
            $table->enum('attendance_type', ['online', 'offline'])->default('online');
            $table->string('rsvp')->nullable();
            $table->integer('max_attendance')->default(0);
            $table->integer('number_of_attendance')->default(0);
            $table->enum('enable_edit_name', [0,1])->default(0);
            $table->enum('have_comments', [0,1])->default(0);
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
