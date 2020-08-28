<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationshipsToPasiensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pasiens', function (Blueprint $table) {
            $table->unsignedBigInteger('antrian_id')->unsigned()->change();
            $table->foreign('antrian_id')->references('id')->on('antrians')
                ->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pasiens', function(Blueprint $table) {
            $table->dropForeign('pasiens_antrian_id_foreign');
        });

        Schema::table('pasiens', function(Blueprint $table) {
            $table->dropIndex('pasiens_antrian_id_foreign');
        });
    
        Schema::table('pasiens', function(Blueprint $table) {
            $table->integer('antrian_id')->change();
        });
    }
}
