<?php

use App\Models\Company;
use App\Models\order;
use App\Models\provence;
use App\Models\transmissionModel;
use App\Models\transmissionType;
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
        Schema::create('transmissions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(transmissionType::class)->constrained();
            $table->foreignIdFor(transmissionModel::class)->constrained();
            $table->string('serialNo');
            $table->tinyInteger('status');
            $table->foreignIdFor(provence::class)->constrained();
            $table->foreignIdFor(order::class)->constrained();
            $table->integer('rate')->default(0);
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
        Schema::dropIfExists('transmissions');
    }
};
