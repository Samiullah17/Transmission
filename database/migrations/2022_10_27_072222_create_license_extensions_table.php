<?php

use App\Models\frequencey;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLicenseExtensionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('license_extensions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(frequencey::class)->constrained();;
            $table->string("finance_recipt");
            $table->string('coming_date');
            $table->string('licence_expiry_date');
            $table->string('valid_upto'); 
            $table->integer('extension_doc_number');
            $table->string('extension_doc_date');


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
        Schema::dropIfExists('license_extensions');
    }
}
