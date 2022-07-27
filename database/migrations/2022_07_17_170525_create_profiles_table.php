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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('cascade');
            $table->char('first_name', 30);
            $table->char('last_name', 30);
            $table->enum('gender', ['male', 'female']);
            $table->string('dob', 15);
            $table->string('country', 50);
            $table->string('state', 50);
            $table->string('city', 50);
            $table->string('zipcode', 10)->nullable();
            $table->string('address', 191);
            $table->string('email_primary', 191);
            $table->string('email_secondary', 191)->nullable();
            $table->string('mobile_primary', 15);
            $table->string('mobile_secondary', 15)->nullable();
            $table->string('mobile_whatsapp', 15)->nullable();
            $table->string('phone', 15)->nullable();
            $table->string('facebook', 191)->nullable();
            $table->string('twitter', 191)->nullable();
            $table->string('linkedin', 191)->nullable();
            $table->string('website', 191)->nullable();
            $table->text('about')->nullable();
            $table->string('avatar', 191)->nullable();
            $table->string('doc', 191)->nullable();
            $table->enum('visibility', ['private', 'public'])->default('private');
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
};
