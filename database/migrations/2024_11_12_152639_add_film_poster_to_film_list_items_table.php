<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('film_list_items', function (Blueprint $table) {
            $table->string('film_poster')->nullable()->after('film_title');
        });
    }

    public function down()
    {
        Schema::table('film_list_items', function (Blueprint $table) {
            $table->dropColumn('film_poster');
        });
    }
};