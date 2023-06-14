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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('subcategory_id');
            $table->integer('chailcategory_id')->nullable();
            $table->integer('brand_id')->nullable();
            $table->string('product_name')->nullable();
            $table->string('product_code')->nullable();
            $table->string('product_unit')->nullable();

            $table->string('product_tags')->nullable();
            $table->string('product_video')->nullable();
            $table->string('product_discount_price')->nullable();
            $table->string('product_purchase_price')->nullable();
            $table->string('product_selling_price')->nullable();
            $table->string('stock_quatity')->nullable();
            $table->integer('ware_house')->nullable();
            $table->string('Product_description')->nullable();
            $table->string('image')->nullable();
            $table->string('thamail_image')->nullable();
            $table->string('today_deal')->nullable();
            $table->string('flash_deal_id')->nullable();
            $table->string('featured')->nullable();
            $table->string('status')->nullable();
            $table->string('cash_on_delivery')->nullable();
            $table->integer('admin_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('subcategory_id')->references('id')->on('sub_categories')->onDelete('cascade');
           
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
};
