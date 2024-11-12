<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {

        // link naar gebruiker ipv lijst binnen user op te slaan, is beter voor de schaalbaarheid
        Schema::create('film_lists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->timestamps();
        });

        Schema::create('film_list_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('film_list_id')->constrained()->onDelete('cascade');
            $table->string('film_id');
            $table->string('film_title');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('film_list_items');
        Schema::dropIfExists('film_lists');
    }
};
