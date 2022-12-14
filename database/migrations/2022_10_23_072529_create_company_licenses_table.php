<?php

use App\Models\Company;
use App\Models\licenseType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyLicensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_licenses', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Company::class)->constrained();
            $table->foreignIdFor(licenseType::class)->constrained();
            $table->string('licenseNumber');
            $table->string('issueDate');
            $table->string('files')->nullable();
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
        Schema::dropIfExists('company_licenses');
    }
}
