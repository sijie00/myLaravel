<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAdmin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('is_admin')
                -> default(false); // set default
            $table -> string('city');
            $table -> string('country');
            $table -> string('postcode');
            $table -> string('address');
            $table -> string('phone');
            $table -> string('gender');
            $table -> string('image_url')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('is_admin'); 
            $table->dropColumn('city'); 
            $table->dropColumn('country'); 
            $table->dropColumn('postcode'); 
            $table->dropColumn('address'); 
            $table->dropColumn('phone'); 
            $table->dropColumn('gender'); 
        });
    
    }
}
