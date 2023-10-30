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
        Schema::create('last_report_files', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('last_report_id');
            $table->foreign('last_report_id')->references('id')->on('last_reports')->onUpdate('cascade')->onDelete('cascade');
            $table->string('name');
            $table->string('file');
            $table->string('type');
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
        Schema::dropIfExists('last_report_files');
    }
};
