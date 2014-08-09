<?php // Example 26-12: logout.php
  require_once 'header.php';

  if (isset($_SESSION['user']))
  {
    destroySession();
    echo "<div class='main'>Αποσυνδεθήκατε. Παρακαλώ πατήστε " .
         "<a href='index.php'>εδώ</a>.";
  }
  else echo "<div class='main'><br>" .
            "Δεν μπορείτε να αποσυνδεθείτε διότι δεν είστε συνδεδεμένος";
?>

<?php require_once 'footer.html' ?>
