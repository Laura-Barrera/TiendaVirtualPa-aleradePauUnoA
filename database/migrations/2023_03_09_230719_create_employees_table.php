<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('name')->nullable(false);
            $table->string('lastName')->nullable(false);
            $table->string('documentType')->nullable(false);
            $table->bigInteger('documentNumber')->nullable(false)->unique();
            $table->bigInteger('phoneNumber')->nullable(false)->unique();
            $table->string('address')->nullable(false);
            $table->date('hiringDate')->nullable(false);
            $table->bigInteger('salary')->nullable(false);
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
