<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTelnuberbalanssTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('telnuberbalanss', function (Blueprint $table) {
            $table->id();

            // 380 - код страны 3 цифры
            // 50 - код оператора 2 цифры
            // 0000000 номер 7 цифр
            // Длину номера брать с запасом, если будем подключать другие станы
            // $table->mediumInteger('countrycode')->unsigned();
            // $table->mediumInteger('operatorcode')->unsigned();
            // $table->unsignedBigInteger('number');

            // int не подходит, номера телефонов могут начинаться c 00000001

            $table->string('countrycode', '6');
            $table->string('operatorcode', '6');
            $table->string('number', '11');


            $table->decimal('balans', $precision = 8, $scale = 2)->default(0);
            $table->unique(['countrycode', 'operatorcode', 'number']);
            // если удалили пользователя - удаляем все номера с балансом
            $table->foreignId('users2s_id')->constrained()->onDelete('cascade');
            $table->timestamps();

        });

        // ALTER TABLE `telnuberbalanss` CHANGE `telnumber` `telnumber` BIGINT(12) UNSIGNED NOT NULL;')
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('telnuberbalans');
    }
}
