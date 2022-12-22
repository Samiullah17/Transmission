<?php

use App\Models\Company;
use App\Models\order;
use App\Models\provence;
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
            $table->string('autraLicenceNo');
            $table->foreignIdFor(provence::class)->constrained();
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
        Schema::dropIfExists('frequenceys');
    }
}
