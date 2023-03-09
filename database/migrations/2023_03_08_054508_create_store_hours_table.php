<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_hours', function (Blueprint $table) {
            $table->id();
            $table->enum('key',['operational','morningSchedule', 'afternoonSchedule'])->unique();
            $table->time('hourFrom');
            $table->time('hourUntil');
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
        Schema::dropIfExists('store_hours');
    }
};
