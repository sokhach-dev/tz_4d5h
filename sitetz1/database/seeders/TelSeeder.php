<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;


// Генерируем каждому пользователю от 1 до 3 номеров телефона с произвольным балансом
// 1 цикл = каждому по 1 номеру = 2000 номеров
// 2 цикл = добавляем пользователям с 0 по 1000 по 1 номеру = +1000 номеров
// 3 цикл = еще раз добавляем пользователям с 0 по 500 по 1 номеру = +1000 номеров
// php artisan db:seed --class=TelSeeder

class TelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //    1 цикл = каждому по 1 номеру = 2000 номеров


        $arraynumber = array();
        for ($i = 1; $i <= 2000; $i++) {


            $operator = array(
                '50', '67', '63', '68',
            );

            $number = mt_rand(1000000, 9000000);


            $grn = mt_rand(-49, 149);
            $kop = mt_rand(0, 99);

            $operator = Arr::random($operator);

            // Если в массиве нету номера, то вставляем в базу
            while (!in_array($number, $arraynumber)) {
                // номера могут дублироваться, заносим все номера в массив
                $arraynumber[] = $number;

                DB::table('telnuberbalanss')->insert([


                    'countrycode' => '380',
                    'operatorcode' => $operator,
                    'number' => $number,
                    'balans' => "$grn.$kop",
                    'users2s_id' => $i,


                ]);
            }

        }


        for ($i = 1; $i <= 1000; $i++) {


            $operator = array(
                '50', '67', '63', '68',
            );

            $number = mt_rand(1000000, 9000000);


            $grn = mt_rand(-49, 149);
            $kop = mt_rand(0, 99);

            $operator = Arr::random($operator);

            // Если в массиве нету номера, то вставляем в базу
            while (!in_array($number, $arraynumber)) {
                // номера могут дублироваться, заносим все номера в массив
                $arraynumber[] = $number;

                DB::table('telnuberbalanss')->insert([


                    'countrycode' => '380',
                    'operatorcode' => $operator,
                    'number' => $number,
                    'balans' => "$grn.$kop",
                    'users2s_id' => $i,


                ]);
            }

        }


        for ($i = 1; $i <= 500; $i++) {


            $operator = array(
                '50', '67', '63', '68',
            );

            $number = mt_rand(1000000, 9000000);


            $grn = mt_rand(-49, 149);
            $kop = mt_rand(0, 99);

            $operator = Arr::random($operator);

            // Если в массиве нету номера, то вставляем в базу
            while (!in_array($number, $arraynumber)) {
                // номера могут дублироваться, заносим все номера в массив
                $arraynumber[] = $number;

                DB::table('telnuberbalanss')->insert([


                    'countrycode' => '380',
                    'operatorcode' => $operator,
                    'number' => $number,
                    'balans' => "$grn.$kop",
                    'users2s_id' => $i,


                ]);
            }

        }



    }
}
