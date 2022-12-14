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
        // Schema::create('users', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('name');
        //     $table->string('email')->unique();
        //     $table->timestamp('email_verified_at')->nullable();
        //     $table->string('password');
        //     $table->rememberToken();
        //     $table->timestamps();
        // });
        if (!Schema::hasTable('users'))
        {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('pname')->nullable();
            $table->string('fname')->nullable();
            $table->string('lname')->nullable();
            $table->string('cid')->nullable();
            $table->string('fingle')->nullable();
            $table->string('tel')->nullable();
            $table->string('username');
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->enum('type', ['ADMIN', 'STAFF', 'CUSTOMER', 'MANAGE','USER','NOTUSER'])->default('USER');
            $table->string('line_token')->nullable();
            $table->string('dep_id')->nullable();
            $table->string('dep_name')->nullable();
            $table->string('dep_subid')->nullable();
            $table->string('dep_subname')->nullable();
            $table->string('dep_subsubid')->nullable();
            $table->string('dep_subsubname')->nullable();
            $table->string('dep_subsubtrueid')->nullable();
            $table->string('dep_subsubtruename')->nullable();
            $table->string('users_type_id')->nullable(); //?????????????????????????????????????????????
            $table->string('users_type_name')->nullable(); //?????????????????????????????????????????????
            $table->string('users_group_id')->nullable(); //????????????????????????????????????
            $table->string('users_group_name')->nullable(); //????????????????????????????????????
            $table->string('position_id')->nullable();
            $table->string('position_name')->nullable();
            $table->string('status')->nullable();
            $table->string('permiss_person')->nullable();
            $table->string('permiss_book')->nullable();
            $table->string('permiss_car')->nullable();
            $table->string('permiss_meetting')->nullable();
            $table->string('permiss_repair')->nullable();
            $table->string('permiss_com')->nullable();
            $table->string('permiss_medical')->nullable();
            $table->string('permiss_hosing')->nullable();
            $table->string('permiss_plan')->nullable();
            $table->string('permiss_asset')->nullable();
            $table->string('permiss_supplies')->nullable();
            $table->string('permiss_store')->nullable();
            $table->string('permiss_store_dug')->nullable();
            $table->string('permiss_pay')->nullable();
            $table->string('store_id')->nullable();
            $table->string('member_id')->nullable();
            $table->string('img')->nullable();
            $table->string('img_name')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
