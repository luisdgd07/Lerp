<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taxes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tax_type_id')->unsigned();
            $table->foreign('tax_type_id')->references('id')->on('tax_rates');
            $table->morphs('taxable');
            $table->integer('item_id')->unsigned()->nullable();
            $table->foreign('item_id')->references('id')->on('items');
            $table->integer('client_id')->unsigned()->nullable();
            $table->foreign('client_id')->references('id')->on('clients');
            $table->string('name');
            $table->decimal('amount', 5, 2);
            $table->decimal('percent', 5, 2);
            $table->tinyInteger('compound_tax')->default(0);
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
        Schema::dropIfExists('taxes');
    }
}
