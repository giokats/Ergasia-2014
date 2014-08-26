<?php //logout.php
  require_once 'header.php';
?>

<?php
  if (isset($_SESSION['user']))
  {
    destroySession();
    echo "<h2>Αποσυνδεθήκατε. Παρακαλώ πατήστε ".
         "<a href='index.php'>εδώ</a></h2>";
  }
  else 
    echo "<h2>Δεν μπορείτε να αποσυνδεθείτε διότι δεν είστε συνδεδεμένος</h2>";
?>

<?php require_once 'footer.html' ?>
