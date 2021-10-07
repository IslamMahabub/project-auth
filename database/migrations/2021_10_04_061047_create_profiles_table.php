<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('contact_no');
            $table->string('email');
            $table->string('user_name');
            $table->string('profile_pic');
            $table->string('dob','20');
            $table->text('residence_location');
            $table->string('current_location_staying_duration');
            $table->string('abroad_staying_duration');
            $table->string('current_profession');
            $table->string('designation');
            $table->string('company_name');
            $table->text('office_address');
            $table->string('visa_status');
            $table->string('passport_no');
            $table->string('passport_valid');
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
        Schema::dropIfExists('profiles');
    }
}
