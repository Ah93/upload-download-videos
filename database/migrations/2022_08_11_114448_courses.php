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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('c_title')->nullable();
            $table->string('c_category')->nullable();
            $table->string('c_vid_file_name')->nullable();
            $table->string('c_vid_file_path')->nullable();
            $table->string('c_thumb_file_name')->nullable();
            $table->string('c_thumb_file_path')->nullable();
            $table->string('c_adoc_file_name')->nullable();
            $table->string('c_adoc_file_path')->nullable();
            $table->string('c_description')->nullable();
            $table->string('uploaded_by')->nullable();
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
        Schema::dropIfExists('courses');
    }
};
