<?php // delete.php
  require_once 'header.php' ;
?>

<?php 
  //Για την διαγραφή ενός άρθρου
  if (isset($_GET['post_id']) && $loggedin ) 
  {
    $id_title = sanitizeString($_GET['post_id']);
    $query  = "DELETE FROM posts WHERE id='$id_title'";
    $result = queryMysql($query);
    echo "<p> Το άρθο διαγράφτηκε με επιτυχία. " ;
    echo "<a href='index.php'>Πατήστε εδώ για να επιστρέψετε στην αρχική σελίδα.</a>" ;
    echo "</p>";
  }
  else
    echo "<p> Το άρθρο δεν μπορεί να διαγραφτεί </p>";
?>

<?php require_once 'footer.html' ?>
