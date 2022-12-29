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
            $table->string('suggestion_file')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->string('created_at')->nullable();
            $table->string('updated_at')->nullable();
            $table->string('discountReason')->nullable();
            $table->string('discountFile')->nullable();
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
