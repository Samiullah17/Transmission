<?php

use App\Models\citizenship;
use App\Models\Company;
use App\Models\companyActiveType;
use App\Models\companyType;
use App\Models\country;
use App\Models\licenceType;
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
<<<<<<< HEAD
            $table->uuid(Company::COMPANY_UNIQUE_ID_COLUMN_NAME);
=======
            $table->uuid('companyId')->nullable();
>>>>>>> 096f0160b1b9ab0bc1e3b62c7b5831ad133969e1
            $table->foreignIdFor(companyType::class)->constrained();
            $table->foreignIdFor(companyActiveType::class)->constrained();
            $table->string('companyManagerName');
            $table->foreignIdFor(country::class)->constrained();
            $table->string('companyAddress');
            $table->float('latitude')->nullable();
            $table->float('longtitude')->nullable();
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
