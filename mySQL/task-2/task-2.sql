Тема: MySQL:

Найти и записать в тетради полное описание SELECT, INSERT, UPDATE, 
DELETE, а также строковые и агрегатные функции.

Практика: (task2)
         а) Сделать тестовую таблицу с 3 полями: 1ое - инт, 2 варчар 
255, 3 текстовое, - внести 700 000 записей, сгенерировав случайную 
информацию
(индексы и автоинкремент не используем);
         б) Проверить поиск 600000-ной записи по каждому полю на 
скорость выполнения и при помощи команды
SHOW SESSION STATUS LIKE 'Last_query_cost' и explain вашего sql 
запроса;
         в) Создаем индекс к каждому полю и повторяем пункт б).

P.S. Все что выполняете в консоли MySQL - логируйте в файл для 
проверки.

______________
I used following way it basically copies data from itself , the data grows exponentially with every execution.Claveat is that You have to have some sample data at first and also you have to execute the query eg I had 327680 rows of data when i started with 10 rows of data .by executing the query just 16 times.Execute one more time and i will hage 655360 rows of data!

 insert into mytable select [col1], [col2], [col3] from mytable 
 _____________
