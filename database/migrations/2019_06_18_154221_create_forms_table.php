<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer('amount');
            $table->string('buyer',255);
            $table->string('receipt_id',20);
            $table->string('items',255);
            $table->string('buyer_email',50);
            $table->string('buyer_ip',20);
            $table->longText('note');
            $table->string('city',20);
            $table->string('phone',20);
            $table->string('hash_key',100);
            $table->dateTime('entry_at');
            $table->string('entry_by',10);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('forms');
    }
}
