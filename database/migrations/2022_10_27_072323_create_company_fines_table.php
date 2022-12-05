<?php

use App\Models\frequencey;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyFinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_fines', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(frequencey::class)->constrained();
            $table->timestamps();
            $table->string('fine_date');
            $table->string('number_of_days');
            $table->integer('fine_fee');
            $table->integer('finance_fine_number');
            $table->string('finace_fine_date');
            $table->integer('fine_bill_number');
            $table->string('fine_recipt_date');
            $table->integer('fine_recipt_number');
            $table->string('bank');
            $table->string("fine_finance_document");
            $table->string("fine_finance_recipt");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_fines');
    }
}
