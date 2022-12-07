<?php

use App\Models\Company;
use App\Models\companyAgent;
use App\Models\provence;
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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Company::class)->constrained();
            $table->foreignIdFor(companyAgent::class)->constrained();
<<<<<<< HEAD
=======
            $table->string('suggestion_file');
            $table->tinyInteger('status')->default(0);
>>>>>>> 096f0160b1b9ab0bc1e3b62c7b5831ad133969e1
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
        Schema::dropIfExists('orders');
    }
};
