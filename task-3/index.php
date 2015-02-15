<?php
include 'config.php';
function __autoload($class)
{
  include('lib/'.$class.'.php');
}

$mySql = new MySql;
$my_select = $mySql
  ->setWhere('')
  ->setColumn('')
  ->setTable('Books')
  ->setValue('2')
  ->selectQuery();
$my_insert = $mySql
  ->setColumn('genre')
  ->setTable('Books')
  ->setValue('')
  ->insertQuery();
$my_update = $mySql
  ->setWhere('kay')
  ->setColumn('*')
  ->setTable('Books')
  ->setValue('2')
  ->updateQuery();
$my_delete = $mySql
  ->setWhere('kay')
  ->setColumn('genre')
  ->setTable('')
  ->setValue('2')
  ->deleteQuery();

$msSql = new MsSql;
$ms_select = $msSql
  ->setWhere('kay')
  ->setColumn('genre')
  ->setTable('Books')
  ->setValue('2')
  ->selectQuery();
$ms_insert = $msSql
  ->setColumn('genre')
  ->setTable('Books')
  ->setValue('2')
  ->insertQuery();
$ms_update = $msSql
  ->setWhere('kay')
  ->setColumn('genre')
  ->setTable('Books')
  ->setValue('2')
  ->updateQuery();
$ms_delete = $msSql
  ->setWhere('kay')
  ->setColumn('genre')
  ->setTable('Books')
  ->setValue('2')
  ->deleteQuery();

$pgSql = new PgSql;
$pg_select = $pgSql
  ->setWhere('kay')
  ->setColumn('genre')
  ->setTable('Books')
  ->setValue('2')
  ->selectQuery();
$pg_insert = $pgSql
  ->setColumn('genre')
  ->setTable('Books')
  ->setValue('2')
  ->insertQuery();
$pg_update = $pgSql
  ->setWhere('kay')
  ->setColumn('genre')
  ->setTable('Books')
  ->setValue('2')
  ->updateQuery();
$pg_delete = $pgSql
  ->setWhere('kay')
  ->setColumn('genre')
  ->setTable('Books')
  ->setValue('2')
  ->deleteQuery();
include VIEW;
?>
