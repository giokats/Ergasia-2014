<?php // header.php

  //checking if a user is logged in
  //http://php.net/manual/en/function.session-start.php
  session_start();

  require_once 'php/functions.php';

  $userstr = ' (Guest)';

  if (isset($_SESSION['user']))
  {
    $user     = $_SESSION['user'];
    $loggedin = TRUE;
    $userstr  = " ($user)";
  }
  else $loggedin = FALSE;
?>

<!DOCTYPE html>
<html>
  <head>

    <script src='js/OSC.js'> 
    </script>

    <script src='js/clock.js'> 
    </script>
  
    <script type="text/javascript">
      //Μία ανώνυμη συνάρτηση η οποία φορτώνει την ώρα στην σελίδα και καλή τον ευατό της κάθε λεπτό.  
      window.onload= function()
      {
        O('wra').innerHTML= GetClock();
        setTimeout("GetClock()", 1000);
      }
    </script>


    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="Αναγνωστόπουλος Βασίλης-Θάνος, Κατσής Γεώργιος">
    <meta name="keywords" content="order,JavaScript">

    <title>Τεχνολογίες Διαδικτύου Εργασία 2014</title>

    <link rel="stylesheet" type="text/css" href="style/style.css" />
    <link rel="stylesheet" type="text/css" href="style/colour.css" />
  </head>

  <body>

<div id="main">


  <header>
    <div id="logo">
      <h1>News Corner</h1>
    </div>
    
    <nav>
      <ul id="menu">
        <li><a "current" href="index.php">Αρχική</a></li>
        <li><a href="index.php?post_category=general">Γενικά</a></li>
        <li><a href="index.php?post_category=economy">Οικονομικά</a></li>
        <li><a href="index.php?post_category=science">Επιστήμη</a></li>
      </ul>
     
      <div id="search">  
        <div id="wra" style="font:10pt Arial; color:#FFFFFF;">
	</div>      
	<form method="get" action="https://www.google.com/search" target="_blank">
          <p>
            <input class="searchfield" type="text" name="q" maxlength="255" value="" />
            <input class="searchbutton" name="submit" type="submit" value="search" />
          </p>
        </form>
      </div>
    <nav>

  </header>


  <div id="site_content"> <!-- τί περιλαμβάνει αυτό ???-->
    <aside>
    <div class="sidebar">
      <div class="sidebaritem">
        <h3>Επιλογές</h3>
        <ul>
        <?php 
          if ($loggedin)
  	  {
 	    echo "<li><a href='logout.php'>Αποσύνδεση $userstr </a></li>";
    	  }
	  else
  	  {
	    echo "<li><a href='login.php'>Σύνδεση</a></li>";
          }
        ?>          
          <li><a href="links.php">Σύνδεσμοι</a></li>
	  <li><a href="mailto:anagnwstopoulos@hotmail.com">Επικοινωνία</a></li>
        </ul>
      </div>
    </div>
    <aside>

    <article>
    <div id="content">

