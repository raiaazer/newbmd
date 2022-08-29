<?php

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
        Schema::create('user_certificate_orders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->foreignId('registry_offices_id')->contrained('registry_offices')->nullable();
            $table->enum('processing_speed', ['Yes', 'No'])->nullable();
            $table->enum('digital_copy', ['Yes', 'No'])->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('wife_first_name')->nullable();
            $table->string('wife_last_name')->nullable();
            $table->string('father_first_name')->nullable();
            $table->string('father_last_name')->nullable();
            $table->string('mother_first_name')->nullable();
            $table->string('mother_last_name')->nullable();
            $table->string('mother_maiden_name')->nullable();
            $table->string('repondent_first_name')->nullable();
            $table->string('repondent_last_name')->nullable();
            $table->string('court_name')->nullable();
            $table->string('case_number')->nullable();
            // $table->string('d_o_decree_nisi')->nullable();
            $table->string('search_period')->nullable();
            $table->string('d_o_b')->nullable();
            $table->string('d_o_marriage')->nullable();
            $table->string('d_o_death')->nullable();
            $table->string('age_at_death')->nullable();
            $table->enum('adopted_person', ['Yes', 'No'])->nullable();
            $table->string('deceased_gender')->nullable();
            $table->string('birth_place')->nullable();
            $table->string('marriage_place')->nullable();
            $table->string('death_place')->nullable();
            $table->string('deceased_occupation')->nullable();
            $table->string('divorce_information')->nullable();
            $table->string('document_legalize')->default(0)->nullable();
            $table->string('certificate_type')->nullable();
            $table->float('document_price')->nullable();
            $table->integer('document_quantity')->nullable();
            $table->string('marital_status')->default(0)->nullable();

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
        Schema::dropIfExists('user_certificate_orders');
    }
};
