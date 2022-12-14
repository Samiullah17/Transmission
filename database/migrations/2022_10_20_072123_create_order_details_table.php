<?php

use App\Models\frequencey;
use App\Models\order;
use App\Models\transmission;
use App\Models\transmissionType;
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
            $table->foreignIdFor(transmissionType::class)->constrained();
            $table->integer('transmissionQuantity');
            $table->string('created_at')->nullable();

            $table->string('updated_at')->nullable();
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
