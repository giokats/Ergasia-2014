<?php // functions.php

  require_once 'mysql_login.php';
  $connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);

  if ($connection->connect_error) die($connection->connect_error);

  //http://stackoverflow.com/questions/13433734/php-mysql-set-names-utf8-collate-utf8-unicode-ci-doesnt-work-with-mysqli-s
  $connection->set_charset("utf8");

  //Γιατί βαριέμαι να γράφω πολλά καθε φορά και επειδή μπορώ ...
  function queryMysql($query)
  {
    global $connection; //use of the global variable
    $result = $connection->query($query);
    if (!$result) die($connection->error);
    return $result;
  }

  function destroySession()
  {
    $_SESSION=array();

    if (session_id() != "" || isset($_COOKIE[session_name()]))
      setcookie(session_name(), '', time()-2592000, '/');

    session_destroy();
  }

  // A function for sanitazing input for the mysql
  function sanitizeString($var)
  {
    global $connection;
    $var = strip_tags($var);
    $var = htmlentities($var);
    $var = stripslashes($var);
    return $connection->real_escape_string($var);
  }

?>
