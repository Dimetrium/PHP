mysql> desc SQLtask2;
+-------+-----------------+------+-----+---------+-------+
| Field | Type            | Null | Key | Default | Extra |
+-------+-----------------+------+-----+---------+-------+
| id    | int(6) unsigned | NO   | PRI | NULL    |       |
| col2  | varchar(255)    | YES  |     | NULL    |       |
| col3  | text            | YES  |     | NULL    |       |
+-------+-----------------+------+-----+---------+-------+
3 rows in set (0.00 sec)

mysql> DELIMITER //
mysql> create procedure test()
    -> begin
    -> declare count int default 1;
    -> while count <= 700000 DO
    -> insert into SQLtask2 (id, col2, col3) value (count, md5(rand()), md5(rand()));
    -> set count = count + 1;
    -> end while;
    -> end //
Query OK, 0 rows affected (0.02 sec)

mysql> delimiter ;
mysql> call test();
Query OK, 1 row affected (1 min 2.30 sec)

SELECT col2, col3 FROM SQLtask2 WHERE id = 600000;
+----------------------------------+----------------------------------+
| col2                             | col3                             |
+----------------------------------+----------------------------------+
| e80b2e33bd818c11074cd192dfde9840 | b2a373fc821879021a9a03c993938770 |
+----------------------------------+----------------------------------+
1 row in set (0.00 sec)

SHOW SESSION STATUS LIKE 'Last_query_cost';
+-----------------+----------+
| Variable_name   | Value    |
+-----------------+----------+
| Last_query_cost | 0.000000 |
+-----------------+----------+
1 row in set (0.00 sec)

explain select col2, col3 from SQLtask2 where id = 600000;
+----+-------------+----------+-------+---------------+---------+---------+-------+------+-------+
| id | select_type | table    | type  | possible_keys | key     | key_len | ref   | rows | Extra |
+----+-------------+----------+-------+---------------+---------+---------+-------+------+-------+
|  1 | SIMPLE      | SQLtask2 | const | PRIMARY       | PRIMARY | 4       | const |    1 |       |
+----+-------------+----------+-------+---------------+---------+---------+-------+------+-------+
1 row in set (0.00 sec)

SELECT id, col3 FROM SQLtask2 WHERE col2 = 'e80b2e33bd818c11074cd192dfde9840';
+--------+----------------------------------+
| id     | col3                             |
+--------+----------------------------------+
| 600000 | b2a373fc821879021a9a03c993938770 |
+--------+----------------------------------+
1 row in set (0.55 sec)

SHOW SESSION STATUS LIKE 'Last_query_cost';
+-----------------+---------------+
| Variable_name   | Value         |
+-----------------+---------------+
| Last_query_cost | 152990.280250 |
+-----------------+---------------+
1 row in set (0.00 sec)

explain SELECT id, col3 FROM SQLtask2 WHERE col2 = 'e80b2e33bd818c11074cd192dfde9840';
+----+-------------+----------+------+---------------+------+---------+------+--------+-------------+
| id | select_type | table    | type | possible_keys | key  | key_len | ref  | rows   | Extra       |
+----+-------------+----------+------+---------------+------+---------+------+--------+-------------+
|  1 | SIMPLE      | SQLtask2 | ALL  | NULL          | NULL | NULL    | NULL | 700000 | Using where |
+----+-------------+----------+------+---------------+------+---------+------+--------+-------------+
1 row in set (0.00 sec)

SELECT id, col2 FROM SQLtask2 WHERE col3 = 'b2a373fc821879021a9a03c993938770';
+--------+----------------------------------+
| id     | col2                             |
+--------+----------------------------------+
| 600000 | e80b2e33bd818c11074cd192dfde9840 |
+--------+----------------------------------+
1 row in set (0.56 sec)

SHOW SESSION STATUS LIKE 'Last_query_cost';
+-----------------+---------------+
| Variable_name   | Value         |
+-----------------+---------------+
| Last_query_cost | 152990.280250 |
+-----------------+---------------+
1 row in set (0.01 sec)

explain SELECT id, col2 FROM SQLtask2 WHERE col3 = 'b2a373fc821879021a9a03c993938770';
+----+-------------+----------+------+---------------+------+---------+------+--------+-------------+
| id | select_type | table    | type | possible_keys | key  | key_len | ref  | rows   | Extra       |
+----+-------------+----------+------+---------------+------+---------+------+--------+-------------+
|  1 | SIMPLE      | SQLtask2 | ALL  | NULL          | NULL | NULL    | NULL | 700000 | Using where |
+----+-------------+----------+------+---------------+------+---------+------+--------+-------------+
1 row in set (0.00 sec)

CREATE INDEX id ON SQLtask2 (id);
Query OK, 700000 rows affected (7.65 sec)
Records: 700000  Duplicates: 0  Warnings: 0

CREATE INDEX name ON SQLtask2 (col2);
Query OK, 700000 rows affected (14.67 sec)
Records: 700000  Duplicates: 0  Warnings: 0

ALTER TABLE SQLtask2 ADD FULLTEXT INDEX (col3);
Query OK, 700000 rows affected (23.34 sec)
Records: 700000  Duplicates: 0  Warnings: 0

SELECT col2, col3 FROM SQLtask2 WHERE id = 600000;
+----------------------------------+----------------------------------+
| col2                             | col3                             |
+----------------------------------+----------------------------------+
| e80b2e33bd818c11074cd192dfde9840 | b2a373fc821879021a9a03c993938770 |
+----------------------------------+----------------------------------+
1 row in set (0.00 sec)

SHOW SESSION STATUS LIKE 'Last_query_cost';
+-----------------+----------+
| Variable_name   | Value    |
+-----------------+----------+
| Last_query_cost | 0.000000 |
+-----------------+----------+
1 row in set (0.00 sec)

explain SELECT col2, col3 FROM SQLtask2 WHERE id = 600000;
+----+-------------+----------+-------+---------------+---------+---------+-------+------+-------+
| id | select_type | table    | type  | possible_keys | key     | key_len | ref   | rows | Extra |
+----+-------------+----------+-------+---------------+---------+---------+-------+------+-------+
|  1 | SIMPLE      | SQLtask2 | const | PRIMARY,id    | PRIMARY | 4       | const |    1 |       |
+----+-------------+----------+-------+---------------+---------+---------+-------+------+-------+
1 row in set (0.00 sec)

SELECT id, col3 FROM SQLtask2 WHERE col2 = 'e80b2e33bd818c11074cd192dfde9840';
+--------+----------------------------------+
| id     | col3                             |
+--------+----------------------------------+
| 600000 | b2a373fc821879021a9a03c993938770 |
+--------+----------------------------------+
1 row in set (0.00 sec)

SHOW SESSION STATUS LIKE 'Last_query_cost';
+-----------------+----------+
| Variable_name   | Value    |
+-----------------+----------+
| Last_query_cost | 1.199000 |
+-----------------+----------+
1 row in set (0.00 sec)

explain select col2, col3 from SQLtask2 where id = 600000;
+----+-------------+----------+-------+---------------+---------+---------+-------+------+-------+
| id | select_type | table    | type  | possible_keys | key     | key_len | ref   | rows | Extra |
+----+-------------+----------+-------+---------------+---------+---------+-------+------+-------+
|  1 | SIMPLE      | SQLtask2 | const | PRIMARY,id    | PRIMARY | 4       | const |    1 |       |
+----+-------------+----------+-------+---------------+---------+---------+-------+------+-------+
1 row in set (0.00 sec)

SELECT id, col2 FROM SQLtask2 WHERE col3 = 'b2a373fc821879021a9a03c993938770';
+--------+----------------------------------+
| id     | col2                             |
+--------+----------------------------------+
| 600000 | e80b2e33bd818c11074cd192dfde9840 |
+--------+----------------------------------+
1 row in set (0.57 sec)

SHOW SESSION STATUS LIKE 'Last_query_cost';
+-----------------+---------------+
| Variable_name   | Value         |
+-----------------+---------------+
| Last_query_cost | 152990.280250 |
+-----------------+---------------+
1 row in set (0.00 sec)

explain SELECT id, col2 FROM SQLtask2 WHERE col3 = 'b2a373fc821879021a9a03c993938770'; 
+----+-------------+----------+------+---------------+------+---------+------+--------+-------------+
| id | select_type | table    | type | possible_keys | key  | key_len | ref  | rows   | Extra       |
+----+-------------+----------+------+---------------+------+---------+------+--------+-------------+
|  1 | SIMPLE      | SQLtask2 | ALL  | col3          | NULL | NULL    | NULL | 700000 | Using where |
+----+-------------+----------+------+---------------+------+---------+------+--------+-------------+
1 row in set (0.00 sec)
