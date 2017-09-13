<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTABLEUCFIRSTTable extends Migration
{
  public function up()
  {
    Schema::create('TABLENAME', function (Blueprint $table)
    {
      $table->increments('id');
// COLUMNS
      $table->rememberToken();
      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::dropIfExists('TABLENAME');
  }
}
