<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('cat_id');
            $table->foreign('cat_id')->references('id')->on('categories');
            $table->string('url');
            $table->longText('description')->nullable();
            $table->longText('specification')->nullable();
            $table->longText('features')->nullable();
            $table->decimal('price', 8, 2);
            $table->float('discount', 8, 2);
            $table->string('barcode')->nullable();
            $table->string('code')->nullable();
            $table->string('color')->nullable();
            $table->string('sku')->nullable();
            $table->integer('stock')->nullable();
            $table->string('image')->nullable();
            $table->tinyInteger('is_featured')->nullable();
            $table->tinyInteger('status')->nullable();
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
        Schema::dropIfExists('products');
    }
}
