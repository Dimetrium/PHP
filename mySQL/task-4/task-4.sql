1. select model, speed, hd FROM pc where price < '500';
2. select distinct maker from product where type = 'Printer';
3. select model, ram, screen from laptop where price > '1000';
4. select code, model, color, type, price from printer where color = 'y';
5. select model, speed, hd from pc where (cd = '12x' or cd = '24x') and price < '600'

30. 
31. select class, country from classes where bore >= '16';
32.
33. Select ship from outcomes where battle = 'North Atlantic' and result = 'sunk'
34. SELECT DISTINCT ships.name 
FROM ships, 
(SELECT type, displacement, class FROM classes) AS class(type, displacement, class_1)
WHERE (class.type = 'bb') 
and (class.displacement > '35') 
and (ships.launched > '1922')
and (ships.class = class.class_1);
