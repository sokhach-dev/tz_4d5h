<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

// Генерируем пользователей
//  php artisan db:seed --class=UserSeeder

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        for ($i = 0; $i < 2000; $i++) {


            // https://github.com/fzaninotto/Faker/blob/master/src/Faker/Provider/ru_RU/Person.php
            $firstName = array(
                'Абрам', 'Август', 'Адам', 'Адриан', 'Аким', 'Александр', 'Алексей', 'Альберт', 'Ананий', 'Анатолий', 'Андрей', 'Антон', 'Антонин',
                'Аполлон', 'Аркадий', 'Арсений', 'Артемий', 'Артур', 'Артём', 'Афанасий', 'Богдан', 'Болеслав', 'Борис', 'Бронислав', 'Вадим',
                'Валентин', 'Валериан', 'Валерий', 'Василий', 'Вениамин', 'Викентий', 'Виктор', 'Виль', 'Виталий', 'Витольд', 'Влад', 'Владимир',
                'Владислав', 'Владлен', 'Всеволод', 'Вячеслав', 'Гавриил', 'Гарри', 'Геннадий', 'Георгий', 'Герасим', 'Герман', 'Глеб', 'Гордей',
                'Григорий', 'Давид', 'Дан', 'Даниил', 'Данила', 'Денис', 'Дмитрий', 'Добрыня', 'Донат', 'Евгений', 'Егор', 'Ефим',
                'Захар', 'Иван', 'Игнат', 'Игнатий', 'Игорь', 'Илларион', 'Илья', 'Иммануил', 'Иннокентий', 'Иосиф', 'Ираклий', 'Кирилл',
                'Клим', 'Константин', 'Кузьма', 'Лаврентий', 'Лев', 'Леонид', 'Макар', 'Максим', 'Марат', 'Марк', 'Матвей', 'Милан',
                'Мирослав', 'Михаил', 'Назар', 'Нестор', 'Никита', 'Никодим', 'Николай', 'Олег', 'Павел', 'Платон', 'Прохор', 'Пётр',
                'Радислав', 'Рафаил', 'Роберт', 'Родион', 'Роман', 'Ростислав', 'Руслан', 'Сава', 'Савва', 'Святослав', 'Семён', 'Сергей',
                'Спартак', 'Станислав', 'Степан', 'Стефан', 'Тарас', 'Тимофей', 'Тимур', 'Тит', 'Трофим', 'Феликс', 'Филипп', 'Фёдор',
                'Эдуард', 'Эрик', 'Юлиан', 'Юлий', 'Юрий', 'Яков', 'Ян', 'Ярослав', 'Милан', 'Александра', 'Алина', 'Алиса', 'Алла', 'Альбина', 'Алёна', 'Анастасия', 'Анжелика', 'Анна', 'Антонина', 'Анфиса', 'Валентина', 'Валерия',
                'Варвара', 'Василиса', 'Вера', 'Вероника', 'Виктория', 'Владлена', 'Галина', 'Дарья', 'Диана', 'Дина', 'Доминика', 'Ева',
                'Евгения', 'Екатерина', 'Елена', 'Елизавета', 'Жанна', 'Зинаида', 'Злата', 'Зоя', 'Изабелла', 'Изольда', 'Инга', 'Инесса',
                'Инна', 'Ирина', 'Искра', 'Капитолина', 'Клавдия', 'Клара', 'Клементина', 'Кристина', 'Ксения', 'Лада', 'Лариса', 'Лидия',
                'Лилия', 'Любовь', 'Людмила', 'Люся', 'Майя', 'Мальвина', 'Маргарита', 'Марина', 'Мария', 'Марта', 'Надежда', 'Наталья',
                'Нелли', 'Ника', 'Нина', 'Нонна', 'Оксана', 'Олеся', 'Ольга', 'Полина', 'Рада', 'Раиса', 'Регина', 'Рената',
                'Розалина', 'Светлана', 'Софья', 'София', 'Таисия', 'Тамара', 'Татьяна', 'Ульяна', 'Фаина', 'Федосья', 'Флорентина', 'Эльвира', 'Эмилия',
                'Эмма', 'Юлия', 'Яна', 'Ярослава',
            );

            $rand_firstName = Arr::random($firstName);

            $int = mt_rand(-611323162, 1282132838);
            $stringdate = date("Y-m-d", $int);

            DB::table('users2s')->insert([

                'name' => "$rand_firstName",
                'birthday' => $stringdate,


            ]);
        }


    }
}
