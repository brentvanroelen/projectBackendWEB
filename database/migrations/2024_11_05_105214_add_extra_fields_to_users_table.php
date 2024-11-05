<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'username')) {
                $table->string('username')->nullable();
            }
            if (!Schema::hasColumn('users', 'birthday')) {
                $table->date('birthday')->nullable();
            }
            if (!Schema::hasColumn('users', 'profile_picture')) {
                $table->string('profile_picture')->nullable();
            }
            if (!Schema::hasColumn('users', 'description')) {
                $table->text('description')->nullable();
            }
        });
    }
    

// In de down() methode
public function down()
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn(['username', 'birthday', 'profile_picture', 'description']);
    });
}

};
