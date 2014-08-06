﻿<?php // header.php

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

      <div id="menubar">
        <ul id="menu">
          <li><a class="current" href="index.html">Αρχική</a></li>
          <li><a href="politika.html">Πολιτικά</a></li>
          <li><a href="oikonomika.html">Οικονομικά</a></li>
          <li><a href="athlitika.html">Αθλητικά</a></li>
        </ul>
     
        <div id="search">  
	  <div id="wra" style="font:10pt Arial; color:#FFFFFF;">
	  </div>      
	  <form method="get" action="http://www.google.com/">
            <p>
              <input class="searchfield" type="text" value="" />
              <input class="searchbutton" name="submit" type="submit" value="search" />
            </p>
          </form>
        </div>
      </div>

    </header>

    <nav>

  <div id="site_content">
    <div class="sidebar">
      <div class="sidebaritem">
        <h3>Επιλογές</h3>
        <ul>
          <li><a class="current" href=" ">Εγγραφή</a></li>
          <li><a href=" ">Σύνδεσμοι</a></li>
	  <li><a href=" ">Επικοινωνία</a></li>
        </ul>
      </div>
    </div>

    <nav>
