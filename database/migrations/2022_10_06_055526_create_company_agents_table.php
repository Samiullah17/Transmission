<?php

use App\Models\district;
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
        Schema::create('company_agents', function (Blueprint $table) {
            $table->id();
            $table->string('agentName');
            $table->string('fName');
            $table->string('gFName');
            $table->string('phone');
            $table->string('email');
            $table->string('NIC');
            $table->foreignIdFor(district::class,'odistrict_id')->constrained('districts');
            $table->string('ovillage');
            $table->foreignIdFor(district::class,'cdistrict_id')->constrained('districts');
            $table->string('cvillage');
            $table->string('photo');
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
        Schema::dropIfExists('company_agents');
    }
};
