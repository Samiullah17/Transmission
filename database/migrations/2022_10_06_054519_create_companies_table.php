<?php

use App\Models\citizenship;
use App\Models\companyActiveType;
use App\Models\companyType;
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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('companyName');
            $table->string('companyId');
            $table->string('licenceNo');
            $table->foreignIdFor(companyType::class)->constrained();
            $table->foreignIdFor(companyActiveType::class)->constrained();
            $table->string('companyManagerName');
            $table->foreignIdFor(citizenship::class)->constrained();
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
        Schema::dropIfExists('companies');
    }
};
