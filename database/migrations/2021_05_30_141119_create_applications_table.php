<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('photo')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('gender');
            $table->string('dob');
            $table->string('age')->nullable();
            $table->string('name_of_guardian');
            $table->string('relationship_with_guardian');
            $table->string('email')->unique();
            $table->text('address_line1');
            $table->text('address_line2')->nullable();
            $table->string('post');
            $table->string('state');
            $table->string('country');
            $table->text('address_in_india')->nullable();
            $table->string('phone');
            $table->string('phone2')->nullable();
            $table->string('whatsapp_number');
            $table->integer('time_preference');
            /**
            * 1:  7:00am to 7:45am
            * 2:  10:00am to 10:45am
            * 3: 2:45pm to 3:30pm
            * 4:  8:30pm to 9:15pm
             */
            $table->boolean('learnt_malayalam_before')->default(0);
            $table->text('know_about_aksharam')->nullable();
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('applications');
    }
}
