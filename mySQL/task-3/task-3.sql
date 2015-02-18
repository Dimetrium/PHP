mysql> SELECT * FROM TableA INNER JOIN TableB ON TableA.name = TableB.name;
+----+--------+----+--------+
| id | name   | id | name   |
+----+--------+----+--------+
|  3 | Ninja  |  4 | Ninja  |
|  1 | Pirate |  2 | Pirate |
+----+--------+----+--------+
2 rows in set (0.00 sec)

mysql> SHOW SESSION STATUS LIKE 'Last_query_cost';
+-----------------+----------+
| Variable_name   | Value    |
+-----------------+----------+
| Last_query_cost | 7.239039 |
+-----------------+----------+
1 row in set (0.00 sec)

mysql> EXPLAIN SELECT * FROM TableA INNER JOIN TableB ON TableA.name = TableB.name;
+----+-------------+--------+------+---------------+------+---------+------+------+--------------------------------+
| id | select_type | table  | type | possible_keys | key  | key_len | ref  | rows | Extra                          |
+----+-------------+--------+------+---------------+------+---------+------+------+--------------------------------+
|  1 | SIMPLE      | TableA | ALL  | NULL          | NULL | NULL    | NULL |    4 |                                |
|  1 | SIMPLE      | TableB | ALL  | NULL          | NULL | NULL    | NULL |    4 | Using where; Using join buffer |
+----+-------------+--------+------+---------------+------+---------+------+------+--------------------------------+
2 rows in set (0.00 sec)

___________________________________________________________________________________________________________

mysql> SELECT * FROM TableA
    ->      LEFT OUTER JOIN TableB
    ->      ON TableA.name = TableB.name
    ->      UNION
    ->      SELECT * FROM TableA
    ->      RIGHT OUTER JOIN TableB
    ->      ON TableA.name = TableB.name;
+------+-----------+------+-------------+
| id   | name      | id   | name        |
+------+-----------+------+-------------+
|    1 | Pirate    |    2 | Pirate      |
|    2 | Monkey    | NULL | NULL        |
|    3 | Ninja     |    4 | Ninja       |
|    4 | Spaghetti | NULL | NULL        |
| NULL | NULL      |    1 | Rutabaga    |
| NULL | NULL      |    3 | Darth Vader |
+------+-----------+------+-------------+
6 rows in set (0.00 sec)

mysql> SHOW SESSION STATUS LIKE 'Last_query_cost';
+-----------------+----------+
| Variable_name   | Value    |
+-----------------+----------+
| Last_query_cost | 0.000000 |
+-----------------+----------+
1 row in set (0.00 sec)

mysql> EXPLAIN SELECT * FROM TableA
    ->     LEFT OUTER JOIN TableB
    ->     ON TableA.name = TableB.name
    ->     UNION
    ->     SELECT * FROM TableA
    ->     RIGHT OUTER JOIN TableB
    ->     ON TableA.name = TableB.name;
+----+--------------+------------+------+---------------+------+---------+------+------+-------+
| id | select_type  | table      | type | possible_keys | key  | key_len | ref  | rows | Extra |
+----+--------------+------------+------+---------------+------+---------+------+------+-------+
|  1 | PRIMARY      | TableA     | ALL  | NULL          | NULL | NULL    | NULL |    4 |       |
|  1 | PRIMARY      | TableB     | ALL  | NULL          | NULL | NULL    | NULL |    4 |       |
|  2 | UNION        | TableB     | ALL  | NULL          | NULL | NULL    | NULL |    4 |       |
|  2 | UNION        | TableA     | ALL  | NULL          | NULL | NULL    | NULL |    4 |       |
| NULL | UNION RESULT | <union1,2> | ALL  | NULL          | NULL | NULL    | NULL | NULL |       |
+----+--------------+------------+------+---------------+------+---------+------+------+-------+
5 rows in set (0.00 sec)
__________________________________________________________________________________________________________________

mysql> SELECT * FROM TableA
    -> LEFT OUTER JOIN TableB
    -> ON TableA.name = TableB.name;
+----+-----------+------+--------+
| id | name      | id   | name   |
+----+-----------+------+--------+
|  1 | Pirate    |    2 | Pirate |
|  2 | Monkey    | NULL | NULL   |
|  3 | Ninja     |    4 | Ninja  |
|  4 | Spaghetti | NULL | NULL   |
+----+-----------+------+--------+
4 rows in set (0.00 sec)

mysql> SHOW SESSION STATUS LIKE 'Last_query_cost';
+-----------------+-----------+
| Variable_name   | Value     |
+-----------------+-----------+
| Last_query_cost | 13.300562 |
+-----------------+-----------+
1 row in set (0.00 sec)

mysql> EXPLAIN SELECT * FROM TableA
    -> LEFT OUTER JOIN TableB
    -> ON TableA.name = TableB.name;
+----+-------------+--------+------+---------------+------+---------+------+------+-------+
| id | select_type | table  | type | possible_keys | key  | key_len | ref  | rows | Extra |
+----+-------------+--------+------+---------------+------+---------+------+------+-------+
|  1 | SIMPLE      | TableA | ALL  | NULL          | NULL | NULL    | NULL |    4 |       |
|  1 | SIMPLE      | TableB | ALL  | NULL          | NULL | NULL    | NULL |    4 |       |
+----+-------------+--------+------+---------------+------+---------+------+------+-------+
2 rows in set (0.00 sec)

__________________________________________________________________________________________________________________
mysql> SELECT * FROM TableA
    -> LEFT OUTER JOIN TableB
    -> ON TableA.name = TableB.name
    -> WHERE TableB.id IS null;
+----+-----------+------+------+
| id | name      | id   | name |
+----+-----------+------+------+
|  2 | Monkey    | NULL | NULL |
|  4 | Spaghetti | NULL | NULL |
+----+-----------+------+------+
2 rows in set (0.00 sec)

mysql> SHOW SESSION STATUS LIKE 'Last_query_cost';
+-----------------+-----------+
| Variable_name   | Value     |
+-----------------+-----------+
| Last_query_cost | 13.300562 |
+-----------------+-----------+
1 row in set (0.00 sec)

mysql> EXPLAIN SELECT * FROM TableA
    -> LEFT OUTER JOIN TableB
    -> ON TableA.name = TableB.name
    -> WHERE TableB.id IS null;
+----+-------------+--------+------+---------------+------+---------+------+------+-------------------------+
| id | select_type | table  | type | possible_keys | key  | key_len | ref  | rows | Extra                   |
+----+-------------+--------+------+---------------+------+---------+------+------+-------------------------+
|  1 | SIMPLE      | TableA | ALL  | NULL          | NULL | NULL    | NULL |    4 |                         |
|  1 | SIMPLE      | TableB | ALL  | NULL          | NULL | NULL    | NULL |    4 | Using where; Not exists |
+----+-------------+--------+------+---------------+------+---------+------+------+-------------------------+
2 rows in set (0.01 sec)

__________________________________________________________________________________________________________________
mysql> SELECT * FROM TableA
    -> LEFT OUTER JOIN TableB
    -> ON TableA.name = TableB.name
    -> WHERE TableA.id IS null
    -> OR TableB.id IS null
    -> UNION
    -> SELECT * FROM TableA
    -> RIGHT OUTER JOIN TableB
    -> ON TableA.name = TableB.name
    -> WHERE TableA.id IS null
    -> OR TableB.id IS null;
+------+-----------+------+-------------+
| id   | name      | id   | name        |
+------+-----------+------+-------------+
|    2 | Monkey    | NULL | NULL        |
|    4 | Spaghetti | NULL | NULL        |
| NULL | NULL      |    1 | Rutabaga    |
| NULL | NULL      |    3 | Darth Vader |
+------+-----------+------+-------------+
4 rows in set (0.00 sec)

mysql> SHOW SESSION STATUS LIKE 'Last_query_cost';
+-----------------+----------+
| Variable_name   | Value    |
+-----------------+----------+
| Last_query_cost | 0.000000 |
+-----------------+----------+
1 row in set (0.01 sec)

mysql> EXPLAIN SELECT * FROM TableA
    -> LEFT OUTER JOIN TableB
    -> ON TableA.name = TableB.name
    -> WHERE TableA.id IS null
    -> OR TableB.id IS null
    -> UNION
    -> SELECT * FROM TableA
    -> RIGHT OUTER JOIN TableB
    -> ON TableA.name = TableB.name
    -> WHERE TableA.id IS null
    -> OR TableB.id IS null;
+----+--------------+------------+------+---------------+------+---------+------+------+-------------------------+
| id | select_type  | table      | type | possible_keys | key  | key_len | ref  | rows | Extra                   |
+----+--------------+------------+------+---------------+------+---------+------+------+-------------------------+
|  1 | PRIMARY      | TableA     | ALL  | NULL          | NULL | NULL    | NULL |    4 |                         |
|  1 | PRIMARY      | TableB     | ALL  | NULL          | NULL | NULL    | NULL |    4 | Using where; Not exists |
|  2 | UNION        | TableB     | ALL  | NULL          | NULL | NULL    | NULL |    4 |                         |
|  2 | UNION        | TableA     | ALL  | NULL          | NULL | NULL    | NULL |    4 | Using where; Not exists |
| NULL | UNION RESULT | <union1,2> | ALL  | NULL          | NULL | NULL    | NULL | NULL |                         |
+----+--------------+------------+------+---------------+------+---------+------+------+-------------------------+
5 rows in set (0.00 sec)
__________________________________________________________________________________________________________________
mysql> SELECT * FROM TableA
    -> CROSS JOIN TableB;
+----+-----------+----+-------------+
| id | name      | id | name        |
+----+-----------+----+-------------+
|  1 | Pirate    |  1 | Rutabaga    |
|  2 | Monkey    |  1 | Rutabaga    |
|  3 | Ninja     |  1 | Rutabaga    |
|  4 | Spaghetti |  1 | Rutabaga    |
|  1 | Pirate    |  4 | Ninja       |
|  2 | Monkey    |  4 | Ninja       |
|  3 | Ninja     |  4 | Ninja       |
|  4 | Spaghetti |  4 | Ninja       |
|  1 | Pirate    |  3 | Darth Vader |
|  2 | Monkey    |  3 | Darth Vader |
|  3 | Ninja     |  3 | Darth Vader |
|  4 | Spaghetti |  3 | Darth Vader |
|  1 | Pirate    |  2 | Pirate      |
|  2 | Monkey    |  2 | Pirate      |
|  3 | Ninja     |  2 | Pirate      |
|  4 | Spaghetti |  2 | Pirate      |
+----+-----------+----+-------------+
16 rows in set (0.00 sec)

mysql> SHOW SESSION STATUS LIKE 'Last_query_cost';
+-----------------+----------+
| Variable_name   | Value    |
+-----------------+----------+
| Last_query_cost | 7.239039 |
+-----------------+----------+
1 row in set (0.00 sec)

mysql> EXPLAIN SELECT * FROM TableA
    -> CROSS JOIN TableB;
+----+-------------+--------+------+---------------+------+---------+------+------+-------------------+
| id | select_type | table  | type | possible_keys | key  | key_len | ref  | rows | Extra             |
+----+-------------+--------+------+---------------+------+---------+------+------+-------------------+
|  1 | SIMPLE      | TableA | ALL  | NULL          | NULL | NULL    | NULL |    4 |                   |
|  1 | SIMPLE      | TableB | ALL  | NULL          | NULL | NULL    | NULL |    4 | Using join buffer |
+----+-------------+--------+------+---------------+------+---------+------+------+-------------------+
2 rows in set (0.00 sec)

__________________________________________________________________________________________________________________

|===============================================================================================================|
|=====================================================| INDEXING |==============================================|
|===============================================================================================================|
__________________________________________________________________________________________________________________

mysql> ALTER TABLE TableA ADD INDEX (name);
Query OK, 4 rows affected (0.01 sec)
Records: 4  Duplicates: 0  Warnings: 0

mysql> ALTER TABLE TableB ADD INDEX (name);
Query OK, 4 rows affected (0.01 sec)
Records: 4  Duplicates: 0  Warnings: 0
__________________________________________________________________________________________________________________

mysql> SELECT * FROM TableA INNER JOIN TableB ON TableA.name = TableB.name;
+----+--------+----+--------+
| id | name   | id | name   |
+----+--------+----+--------+
|  3 | Ninja  |  4 | Ninja  |
|  1 | Pirate |  2 | Pirate |
+----+--------+----+--------+
2 rows in set (0.00 sec)

mysql> SHOW SESSION STATUS LIKE 'Last_query_cost';
+-----------------+----------+
| Variable_name   | Value    |
+-----------------+----------+
| Last_query_cost | 6.639039 | (before index = 7.239039)
+-----------------+----------+
1 row in set (0.00 sec)

mysql> EXPLAIN SELECT * FROM TableA INNER JOIN TableB ON TableA.name = TableB.name;
+----+-------------+--------+------+---------------+------+---------+------+------+--------------------------------+
| id | select_type | table  | type | possible_keys | key  | key_len | ref  | rows | Extra                          |
+----+-------------+--------+------+---------------+------+---------+------+------+--------------------------------+
|  1 | SIMPLE      | TableA | ALL  | name          | NULL | NULL    | NULL |    4 |                                |
|  1 | SIMPLE      | TableB | ALL  | name          | NULL | NULL    | NULL |    4 | Using where; Using join buffer |
+----+-------------+--------+------+---------------+------+---------+------+------+--------------------------------+
2 rows in set (0.00 sec)
__________________________________________________________________________________________________________________
mysql> SELECT * FROM TableA
    -> LEFT OUTER JOIN TableB
    -> ON TableA.name = TableB.name
    -> UNION
    -> SELECT * FROM TableA
    -> RIGHT OUTER JOIN TableB
    -> ON TableA.name = TableB.name;
+------+-----------+------+-------------+
| id   | name      | id   | name        |
+------+-----------+------+-------------+
|    1 | Pirate    |    2 | Pirate      |
|    2 | Monkey    | NULL | NULL        |
|    3 | Ninja     |    4 | Ninja       |
|    4 | Spaghetti | NULL | NULL        |
| NULL | NULL      |    1 | Rutabaga    |
| NULL | NULL      |    3 | Darth Vader |
+------+-----------+------+-------------+
6 rows in set (0.00 sec)

mysql> SHOW SESSION STATUS LIKE 'Last_query_cost';
+-----------------+----------+
| Variable_name   | Value    |
+-----------------+----------+
| Last_query_cost | 0.000000 |
+-----------------+----------+
1 row in set (0.00 sec)

mysql> EXPLAIN SELECT * FROM TableA
    -> LEFT OUTER JOIN TableB
    -> ON TableA.name = TableB.name
    -> UNION
    -> SELECT * FROM TableA
    -> RIGHT OUTER JOIN TableB
    -> ON TableA.name = TableB.name;
+----+--------------+------------+------+---------------+------+---------+-------------------+------+-------+
| id | select_type  | table      | type | possible_keys | key  | key_len | ref               | rows | Extra |
+----+--------------+------------+------+---------------+------+---------+-------------------+------+-------+
|  1 | PRIMARY      | TableA     | ALL  | NULL          | NULL | NULL    | NULL              |    4 |       |
|  1 | PRIMARY      | TableB     | ref  | name          | name | 258     | user5.TableA.name |    2 |       |
|  2 | UNION        | TableB     | ALL  | NULL          | NULL | NULL    | NULL              |    4 |       |
|  2 | UNION        | TableA     | ref  | name          | name | 258     | user5.TableB.name |    2 |       |
| NULL | UNION RESULT | <union1,2> | ALL  | NULL          | NULL | NULL    | NULL              | NULL |       |
+----+--------------+------------+------+---------------+------+---------+-------------------+------+-------+
5 rows in set (0.00 sec)

__________________________________________________________________________________________________________________
mysql> SELECT * FROM TableA
    -> LEFT OUTER JOIN TableB
    -> ON TableA.name = TableB.name;
+----+-----------+------+--------+
| id | name      | id   | name   |
+----+-----------+------+--------+
|  1 | Pirate    |    2 | Pirate |
|  2 | Monkey    | NULL | NULL   |
|  3 | Ninja     |    4 | Ninja  |
|  4 | Spaghetti | NULL | NULL   |
+----+-----------+------+--------+
4 rows in set (0.00 sec)

mysql> SHOW SESSION STATUS LIKE 'Last_query_cost';
+-----------------+-----------+
| Variable_name   | Value     |
+-----------------+-----------+
| Last_query_cost | 11.618531 | (before indexing = 13.300562)
+-----------------+-----------+
1 row in set (0.00 sec)

mysql> EXPLAIN SELECT * FROM TableA
    -> LEFT OUTER JOIN TableB
    -> ON TableA.name = TableB.name;
+----+-------------+--------+------+---------------+------+---------+-------------------+------+-------+
| id | select_type | table  | type | possible_keys | key  | key_len | ref               | rows | Extra |
+----+-------------+--------+------+---------------+------+---------+-------------------+------+-------+
|  1 | SIMPLE      | TableA | ALL  | NULL          | NULL | NULL    | NULL              |    4 |       |
|  1 | SIMPLE      | TableB | ref  | name          | name | 258     | user5.TableA.name |    2 |       |
+----+-------------+--------+------+---------------+------+---------+-------------------+------+-------+
2 rows in set (0.00 sec)

__________________________________________________________________________________________________________________
mysql> SELECT * FROM TableA
    -> LEFT OUTER JOIN TableB
    -> ON TableA.name = TableB.name
    -> WHERE TableB.id IS null;
+----+-----------+------+------+
| id | name      | id   | name |
+----+-----------+------+------+
|  2 | Monkey    | NULL | NULL |
|  4 | Spaghetti | NULL | NULL |
+----+-----------+------+------+
2 rows in set (0.00 sec)

mysql> SHOW SESSION STATUS LIKE 'Last_query_cost';
+-----------------+-----------+
| Variable_name   | Value     |
+-----------------+-----------+
| Last_query_cost | 11.618531 | (before indexing = 13.300562)
+-----------------+-----------+
1 row in set (0.00 sec)

mysql> EXPLAIN SELECT * FROM TableA
    -> LEFT OUTER JOIN TableB
    -> ON TableA.name = TableB.name
    -> WHERE TableB.id IS null;
+----+-------------+--------+------+---------------+------+---------+-------------------+------+-------------------------+
| id | select_type | table  | type | possible_keys | key  | key_len | ref               | rows | Extra                   |
+----+-------------+--------+------+---------------+------+---------+-------------------+------+-------------------------+
|  1 | SIMPLE      | TableA | ALL  | NULL          | NULL | NULL    | NULL              |    4 |                         |
|  1 | SIMPLE      | TableB | ref  | name          | name | 258     | user5.TableA.name |    2 | Using where; Not exists |
+----+-------------+--------+------+---------------+------+---------+-------------------+------+-------------------------+
2 rows in set (0.01 sec)
__________________________________________________________________________________________________________________
mysql> SELECT * FROM TableA
    -> LEFT OUTER JOIN TableB
    -> ON TableA.name = TableB.name
    -> WHERE TableA.id IS null
    -> OR TableB.id IS null
    -> UNION
    -> SELECT * FROM TableA
    -> RIGHT OUTER JOIN TableB
    -> ON TableA.name = TableB.name
    -> WHERE TableA.id IS null
    -> OR TableB.id IS null;
+------+-----------+------+-------------+
| id   | name      | id   | name        |
+------+-----------+------+-------------+
|    2 | Monkey    | NULL | NULL        |
|    4 | Spaghetti | NULL | NULL        |
| NULL | NULL      |    1 | Rutabaga    |
| NULL | NULL      |    3 | Darth Vader |
+------+-----------+------+-------------+
4 rows in set (0.01 sec)

mysql> SHOW SESSION STATUS LIKE 'Last_query_cost';
+-----------------+----------+
| Variable_name   | Value    |
+-----------------+----------+
| Last_query_cost | 0.000000 |
+-----------------+----------+
1 row in set (0.00 sec)

mysql> EXPLAIN SELECT * FROM TableA
    -> LEFT OUTER JOIN TableB
    -> ON TableA.name = TableB.name
    -> WHERE TableA.id IS null
    -> OR TableB.id IS null
    -> UNION
    -> SELECT * FROM TableA
    -> RIGHT OUTER JOIN TableB
    -> ON TableA.name = TableB.name
    -> WHERE TableA.id IS null
    -> OR TableB.id IS null;
+----+--------------+------------+------+---------------+------+---------+-------------------+------+-------------------------+
| id | select_type  | table      | type | possible_keys | key  | key_len | ref               | rows | Extra                   |
+----+--------------+------------+------+---------------+------+---------+-------------------+------+-------------------------+
|  1 | PRIMARY      | TableA     | ALL  | NULL          | NULL | NULL    | NULL              |    4 |                         |
|  1 | PRIMARY      | TableB     | ref  | name          | name | 258     | user5.TableA.name |    2 | Using where; Not exists |
|  2 | UNION        | TableB     | ALL  | NULL          | NULL | NULL    | NULL              |    4 |                         |
|  2 | UNION        | TableA     | ref  | name          | name | 258     | user5.TableB.name |    2 | Using where; Not exists |
| NULL | UNION RESULT | <union1,2> | ALL  | NULL          | NULL | NULL    | NULL              | NULL |                         |
+----+--------------+------------+------+---------------+------+---------+-------------------+------+-------------------------+
5 rows in set (0.00 sec)

__________________________________________________________________________________________________________________
mysql> SELECT * FROM TableA
    -> CROSS JOIN TableB;
+----+-----------+----+-------------+
| id | name      | id | name        |
+----+-----------+----+-------------+
|  1 | Pirate    |  1 | Rutabaga    |
|  2 | Monkey    |  1 | Rutabaga    |
|  3 | Ninja     |  1 | Rutabaga    |
|  4 | Spaghetti |  1 | Rutabaga    |
|  1 | Pirate    |  4 | Ninja       |
|  2 | Monkey    |  4 | Ninja       |
|  3 | Ninja     |  4 | Ninja       |
|  4 | Spaghetti |  4 | Ninja       |
|  1 | Pirate    |  3 | Darth Vader |
|  2 | Monkey    |  3 | Darth Vader |
|  3 | Ninja     |  3 | Darth Vader |
|  4 | Spaghetti |  3 | Darth Vader |
|  1 | Pirate    |  2 | Pirate      |
|  2 | Monkey    |  2 | Pirate      |
|  3 | Ninja     |  2 | Pirate      |
|  4 | Spaghetti |  2 | Pirate      |
+----+-----------+----+-------------+
16 rows in set (0.00 sec)

mysql> SHOW SESSION STATUS LIKE 'Last_query_cost';
+-----------------+----------+
| Variable_name   | Value    |
+-----------------+----------+
| Last_query_cost | 7.239039 | (before indexing = 7.239039)
+-----------------+----------+
1 row in set (0.00 sec)

mysql> EXPLAIN SELECT * FROM TableA
    -> CROSS JOIN TableB;
+----+-------------+--------+------+---------------+------+---------+------+------+-------------------+
| id | select_type | table  | type | possible_keys | key  | key_len | ref  | rows | Extra             |
+----+-------------+--------+------+---------------+------+---------+------+------+-------------------+
|  1 | SIMPLE      | TableA | ALL  | NULL          | NULL | NULL    | NULL |    4 |                   |
|  1 | SIMPLE      | TableB | ALL  | NULL          | NULL | NULL    | NULL |    4 | Using join buffer |
+----+-------------+--------+------+---------------+------+---------+------+------+-------------------+
2 rows in set (0.00 sec)
