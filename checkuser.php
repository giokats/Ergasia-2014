<?php // checkuser.php
  require_once 'php/functions.php';

  if (isset($_POST['user']))
  {
    $user   = sanitizeString($_POST['user']);
    $result = queryMysql("SELECT * FROM members WHERE user='$user'");

    if ($result->num_rows)
      echo  "<span class='taken'>&nbsp;&#x2718; " .
            "Διαλέξτε άλλο Username</span>";
    else
      echo "<span class='available'>&nbsp;&#x2714; " .
           "Το username μπορεί να χρησιμοποιηθεί</span>";
  }
?>
