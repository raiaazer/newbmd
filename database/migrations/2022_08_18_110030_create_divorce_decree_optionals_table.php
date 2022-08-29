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
        Schema::create('divorce_decree_optionals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_certificate_order_id');
            $table->string('court_filed')->nullable();
            $table->string('court_pronounced')->nullable();
            $table->string('d_o_marriage')->nullable();
            $table->string('d_o_separation')->nullable();
            $table->string('d_o_decree_nisi')->nullable();
            $table->string('d_o_petition_filed')->nullable();
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
        Schema::dropIfExists('divorce_decree_optionals');
    }
};
