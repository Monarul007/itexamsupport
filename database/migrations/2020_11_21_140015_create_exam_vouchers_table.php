<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_vouchers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('exam_id')->nullable();
            $table->foreign('exam_id')->references('id')->on('exams');
            $table->unsignedBigInteger('vendor_id')->nullable();
            $table->foreign('vendor_id')->references('id')->on('vendors');
            $table->unsignedBigInteger('certification_id')->nullable();
            $table->foreign('certification_id')->references('id')->on('certifications');
            $table->string('name', 255)->nullable();
            $table->string('type', 255)->nullable();
            $table->decimal('price', 8, 2);
            $table->longText('description')->nullable();
            $table->string('attachment', 255)->nullable();
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
        Schema::dropIfExists('exam_vouchers');
    }
}
