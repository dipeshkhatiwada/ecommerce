<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('subcategory_id');
            $table->string('name','50');
            $table->unsignedInteger('price');
            $table->unsignedInteger('discount');
            $table->unsignedInteger('quantity');
            $table->unsignedInteger('stock');
            $table->text('short_description');
            $table->text('description');
            $table->boolean('slider_key')->default(0);
            $table->boolean('feature_key')->default('0');
            $table->boolean('discount_key')->default('0');
            $table->unsignedInteger('view_count');
            $table->boolean('status')->default('0');
            $table->string('slug');
            $table->unsignedInteger('created_by');
            $table->unsignedInteger('updated_by')->nullable();
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade');
            $table->foreign('subcategory_id')->references('id')->on('subcategories')->onUpdate('cascade');
            $table->foreign('created_by')->references('id')->on('users')->onUpdate('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onUpdate('cascade');
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
