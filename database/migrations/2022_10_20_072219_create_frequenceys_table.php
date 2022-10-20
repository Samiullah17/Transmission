<?php

use App\Models\Company;
use App\Models\order;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFrequenceysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frequenceys', function (Blueprint $table) {
            $table->id();
            $table->string('frequenceyNo');
            $table->foreignIdFor(order::class)->constrained();
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
        Schema::dropIfExists('frequenceys');
    }
}
