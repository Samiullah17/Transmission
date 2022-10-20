<?php

use App\Models\frequencey;
use App\Models\order;
use App\Models\transmission;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(order::class)->constrained();
            $table->foreignIdFor(order::class)->constrained();
            $table->foreignIdFor(frequencey::class)->constrained();
            $table->foreignIdFor(transmission::class)->constrained();
            $table->integer('transmissionQuantity');
            $table->tinyInteger('status');
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
        Schema::dropIfExists('order_details');
    }
}
