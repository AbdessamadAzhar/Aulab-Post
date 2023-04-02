<?php


use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            
            $table->boolean('is_admin')->after('email')->nullable()->default(false);
            $table->boolean('is_revisor')->after('is_admin')->nullable()->default(false);
            $table->boolean('is_writer')->after('is_revisor')->nullable()->default(false);
        });

       


    }
    public function down()
    {
       
        User::where('email', 'admin@theaulabpost')->delete();

        Schema::table('users', function (Blueprint $table){
            $table->dropColumn(['is_admin', 'is_revisor', 'is_writer']);
        });


    
    }


};