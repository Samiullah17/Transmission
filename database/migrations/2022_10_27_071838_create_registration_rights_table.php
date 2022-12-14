<?php

use App\Models\Company;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrationRightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registration_rights', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Company::class)->constrained();
            $table->string("reg_year");
            $table->integer("finance_number");
            $table->string("finance_date");
            $table->integer("bill_number");
            $table->string("recipt_number");
            $table->string("recipt_date");
            $table->integer("total_registration_fee");
            $table->string("bank");
            $table->string("finance_document");
            $table->string("finance_recipt");
            $table->string("ExpireREg_year");
            $table->tinyinteger("status");
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
        Schema::dropIfExists('registration_rights');
    }
}
