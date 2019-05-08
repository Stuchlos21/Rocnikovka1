<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hours', function (Blueprint $table) {
            $table->increments('id_hodiny');
            $table->string('id_user');
            //jméno sloupce     //sloupec o odkazované tabulce      //název tabulky odkazu
            $table->string('ucitel');
            $table->integer('Číslo_ve_dni');
            $table->date('datum');
            $table->date('end_date');
            $table->string('vozidlo');
            $table->string('barva');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hours');
    }
}
