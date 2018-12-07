<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
 {
     Schema::table('products', function($table) {
         $table->text('date');
     });
 }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
