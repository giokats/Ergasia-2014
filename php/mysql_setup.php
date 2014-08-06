<!DOCTYPE html>
<html>
  <head>
    <title>Setting up database</title>
  </head>
  <body>

    <h3>Setting up...</h3>

<?php // setup.php

  require_once 'mysql_login.php';
  require_once 'functions.php';

  echo "Droping existings tables... ";

  //http://www.sqlines.com/mysql/set_foreign_key_checks
  queryMysql("SET foreign_key_checks = 0");
  if ($tables = queryMysql("SHOW TABLES"))
  { 
    while ($row = $tables->fetch_array(MYSQLI_NUM))
    {
      queryMysql("DROP TABLE IF EXISTS ".$row[0]);
    }

  }

  echo "OK<br><br>";

   queryMysql("SET foreign_key_checks = 1");
  
  //Function for creating the tables 
  function createTable($name, $query)
  {
    echo "Creating table '$name' ... ";
    //a fuction included in functions.php
    queryMysql("CREATE TABLE IF NOT EXISTS $name($query)");
    echo "OK <br>";
  }

  createTable('members',
              'user VARCHAR(16),
              pass VARCHAR(16),
              INDEX(user(6))');

  echo "Inserting values into table ... ";
  queryMysql("INSERT INTO members VALUES('anagno', 'anagno')");
  queryMysql("INSERT INTO members VALUES('tme121', 'tme121')");
  echo "OK <br>";

?>

    <br>...done.
  </body>
</html>
