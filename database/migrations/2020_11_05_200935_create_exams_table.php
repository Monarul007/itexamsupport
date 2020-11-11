<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vendor_id');
            $table->foreign('vendor_id')->references('id')->on('vendors');
            $table->unsignedBigInteger('certification_id');
            $table->foreign('certification_id')->references('id')->on('certifications');
            $table->string('exam_title', 255);
            $table->string('exam_code', 255);
            $table->string('total_questions', 255);
            $table->string('product_type', 255);
            $table->string('attachment', 255);
            $table->string('features', 255);
            $table->string('extra_features', 255);
            $table->string('description', 255);
            $table->tinyInteger('status');
            $table->tinyInteger('featured');
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
        Schema::dropIfExists('exams');
    }
}
