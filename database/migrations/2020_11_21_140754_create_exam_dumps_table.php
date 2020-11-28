<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamDumpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_dumps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vendor_id');
            $table->foreign('vendor_id')->references('id')->on('vendors');
            $table->unsignedBigInteger('certification_id');
            $table->foreign('certification_id')->references('id')->on('certifications');
            $table->string('dump_title', 255)->nullable();
            $table->string('exam_title', 255)->nullable();
            $table->string('exam_code', 255)->nullable();
            $table->string('total_questions', 255);
            $table->decimal('price', 8, 2);
            $table->string('attachment', 255);
            $table->longText('description')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->tinyInteger('featured')->nullable();
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
        Schema::dropIfExists('exam_dumps');
    }
}
