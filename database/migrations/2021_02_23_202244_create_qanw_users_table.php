<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQanwUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * NOTE: table named QANW as existing users table already exists for another project.
     * Under normal circumstances this would just be named 'users'.
     * So pipe doon James
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qanw_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('username');
            $table->string('email');
            $table->string('address_line_1');
            $table->string('address_line_2');
            $table->string('city');
            $table->string('zipcode');
            $table->decimal('geo-lat', 10, 7);
            $table->decimal('geo-lng', 10, 7);
            $table->string('phone');
            $table->string('website');
            $table->string('company_name');
            $table->string('company_catchphrase');
            $table->string('company_bs');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('qanw_users');
    }
}
