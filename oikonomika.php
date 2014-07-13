<!DOCTYPE html>
<html>
<head>
<script type="text/javascript">

function GetClock(){
d = new Date();
nday   = d.getDay();
nmonth = d.getMonth();
ndate  = d.getDate();
nyear = d.getYear();
nhour  = d.getHours();
nmin   = d.getMinutes();
if(nyear<1000) nyear=nyear+1900;

if(nmin <= 9){nmin="0"+nmin}


document.getElementById('wra').innerHTML=""+(nmonth+1)+"/"+ndate+"/"+nyear+" "+nhour+":"+nmin+"";
setTimeout("GetClock()", 1000);
}
window.onload=GetClock;
</script>
<title>Οικονομία</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="style/style.css" />
<link rel="stylesheet" type="text/css" href="style/colour.css" />
</head>
<body>
<div id="main">
  <div id="logo">
    <h1>News Corner</h1>
  </div>
  <div id="menubar">
    <ul id="menu">
      <li><a class="current" href="arxiki.php">Αρχική</a></li>
      <li><a href="politika.php">Πολιτικά</a></li>
      <li><a href="oikonomika.php">Οικονομικά</a></li>
      <li><a href="athlitika.php">Αθλητικά</a></li>
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
<div id="site_content">
<div class="sidebar">
      <div class="sidebaritem">
        <h3>Θέματα</h3>
        <ul>
          <li><a class="current" href=" ">Θέμα 1</a></li>
          <li><a href=" ">Θέμα 2</a></li>
	  <li><a href=" ">Θέμα 3</a></li>
        </ul>
      </div>
      <div class="sidebaritem">
        <h3>Επιλογές</h3>
        <ul>
          <li><a class="current" href=" ">Εγγραφή</a></li>
          <li><a href=" ">Σύνδεσμοι</a></li>
	  <li><a href=" ">Επικοινωνία</a></li>
        </ul>
      </div>
    </div>
  
    <div id="content">
       <p> Οικονομικές Ειδήσεις.... </p>
    </div> 
<p>
<?php

// Connect your Database

$connectDatabase = mysql_connect('localhost', 'root', '');
if ($connectDatabase) {
	    echo ("Connection is succeed");
	} else {
	    echo ("Connection is fail");
	}

?>
<?php
//select the database you want to connect with

mysql_select_db("site",$connectDatabase)

or die ("Could not connect to database ... \n" . mysql_error ());

$query="SELECT titlos FROM eidiseis";
$result = mysql_query($query);

while($row = mysql_fetch_array($result)) {

  echo $row['titlos'];
}

?>
  </p>
  </div>
  <div id="footer"> Copyright &copy; News Corner - 2014</div>
</div>
</body>
</html>
