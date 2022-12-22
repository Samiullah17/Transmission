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

            $table->uuid(Company::COMPANY_UNIQUE_ID_COLUMN_NAME);

            $table->foreignIdFor(companyType::class)->constrained();
            $table->foreignIdFor(companyActiveType::class)->constrained();
            $table->string('companyManagerName');
            $table->foreignIdFor(country::class)->constrained();
            $table->string('companyAddress');
            $table->float('latitude')->nullable();
            $table->float('longtitude')->nullable();
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('companies');
    }
};
