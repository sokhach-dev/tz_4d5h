<?php


class Operator
{


    private $_conn;
    private $_sql;
    private $_result;
    private $_row;

    function db_connect()
    {


        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "laraveltz1";

        try {
            $_conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $this->_conn = $_conn;

        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }


    }


    // 1.	зная ID пользователя получаем его имя, год рождения и список телефонных номеров;
    public function getUserNameBirthDayNumber($userid)
    {

        $a = $this->_conn->query("SELECT name, birthday FROM users2s WHERE id = $userid")->fetchAll(PDO::FETCH_ASSOC);
        $b = $this->_conn->query("SELECT operatorcode, number, countrycode FROM `telnuberbalanss` WHERE `users2s_id` = $userid")->fetchAll(PDO::FETCH_ASSOC);

        return '<pre>' . var_export($a, true) . '</pre> <pre>' . var_export($b, true) . '</pre>  ';


    }


// 2.	возможность пополнить любой из номеров на сумму до 100грн. максимум за одно пополнение;
    public function updateBalans($rawnumber, $sum)
    {


        $countrycode = mb_substr($rawnumber, 0, 3, "UTF-8");
        $operatorcode = mb_substr($rawnumber, 3, 2, "UTF-8");
        $number = mb_substr($rawnumber, 5, 7, "UTF-8");


        if ($sum <= 100) {

            $a = $this->_conn->query("UPDATE `telnuberbalanss` SET `balans` = `balans`+'$sum' WHERE `countrycode` = $countrycode AND `operatorcode` = $operatorcode AND `number` = $number");

            return 'Номер телефона пополнили на  ' . $sum . ' грн.';

        } else {
            return 'Максимальная сумма пополнения 100 грн';
        }

    }


//3.	возможность добавить нового пользователя;
    public function createUser($username, $birthday)
    {

        $a = $this->_conn->query("INSERT INTO `users2s` (`name`, `birthday`) VALUES ('$username', '$birthday')");
        return 'Добавили пользователя ' . $username . " " . $birthday . ' года рождения';

    }


    // 4.	возможность добавить для пользователя номер мобильного телефона;
// (т.к. пользователей может быть несколько, будем с именем указывать дату рождения)
    public function addTelNumber($name, $birthday, $rawnumber)
    {

        // получаем id пользователя, для которого будем вставлять номер
        $a = $this->_conn->query("SELECT id FROM `users2s` WHERE `name` = '$name' AND `birthday` = '$birthday'")->fetch(PDO::FETCH_ASSOC);
        $id = $a[id];


        $countrycode = mb_substr($rawnumber, 0, 3, "UTF-8");
        $operatorcode = mb_substr($rawnumber, 3, 2, "UTF-8");
        $number = mb_substr($rawnumber, 5, 7, "UTF-8");


        $this->_conn->query("INSERT INTO `telnuberbalanss` ( `countrycode`, `operatorcode`, `number`, `users2s_id`) VALUES ('$countrycode','$operatorcode','$number','$id')");


        return 'номер телефона добавлен';

    }






    // 5.	возможность удалить всю информацию о пользователе вместе с номерами телефонов;
// (ON DELETE CASCADE связь, по этому достаточно удалить только с одной таблицы)


    public function deleteUser($name, $birthday)
    {

        // получаем id пользователя, для которого будем вставлять номер
        $a = $this->_conn->query("
        DELETE FROM `users2s`
        WHERE `name` = '$name'
        AND
        `birthday` = '$birthday'
        ");


        return 'Пользователь и его номера телефонов с балансом удалены';

    }


}

$operator = new  Operator();

$operator->db_connect();

// 1.	зная ID пользователя получаем его имя, год рождения и список телефонных номеров;
//echo $operator->getUserNameBirthDayNumber("2");

// 2.	возможность пополнить любой из номеров на сумму до 100грн. максимум за одно пополнение;
//echo $operator->updateBalans("380686272405", '10.24');

// 3.	возможность добавить нового пользователя;
//echo $operator->createUser("Вася Пупкин", '2021-08-03');


// 4.	возможность добавить для пользователя номер мобильного телефона;
// (т.к. пользователей может быть несколько, будем с именем указывать дату рождения)
//echo $operator->addTelNumber("Михаил", "1977-08-19", '380680000002');

// 5.	возможность удалить всю информацию о пользователе вместе с номерами телефонов;
// (ON DELETE CASCADE связь, по этому достаточно удалить только с одной таблицы)
//echo $operator->deleteUser("Михаил", "1977-08-19");
