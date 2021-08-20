Начал писать ТЗ на laravel, создал миграции, сиддинг для тестовых данных. 
Дальше просто написал класс laratz1\sitetz1\public\1.php 
Есть понятие что нужна куча проверок данных, но этого в ТЗ нет. как в тз написано так и делал.







1.	Баланс по каждому пользователю (сумма денег по всем номерам и операторам каждого пользователя);

SELECT u.name, SUM(balans) 
FROM `users2s` u 
LEFT JOIN telnuberbalanss t ON u.id=t.users2s_id
GROUP BY t.users2s_id

2. (список: код оператора, кол-во номеров этого оператора);

SELECT operatorcode, COUNT(DISTINCT number) AS KolichestvoNomerov FROM `telnuberbalanss` GROUP BY operatorcode

3.	количество телефонов у каждого пользователя (список: имя пользователя, кол-во номеров у пользователя);

SELECT u.name, COUNT(DISTINCT number) AS KolichestvoNomerov
FROM `users2s` u 
LEFT JOIN telnuberbalanss t ON u.id=t.users2s_id
GROUP BY t.users2s_id

4.	количество телефонов у каждого пользователя (список: имя пользователя, кол-во номеров у пользователя);

SELECT u.name, COUNT(DISTINCT number) AS KolichestvoNomerov
FROM `users2s` u 
LEFT JOIN telnuberbalanss t ON u.id=t.users2s_id
GROUP BY t.users2s_id

5. вывести имена 10 пользователей с максимальным балансом на счету (максимальный баланс по одному номеру);

SELECT u.name, t.operatorcode, t.number, t.balans
FROM `users2s` u 
LEFT JOIN telnuberbalanss t ON u.id=t.users2s_id
GROUP BY t.users2s_id
ORDER BY `t`.`balans` DESC
LIMIT 10


