<?php // import.php
  require_once 'header.php' ;
?>


<?php 

  if (isset($_POST['title']) && $loggedin)
  {
    $title = sanitizeString($_POST['title']);
    $category = sanitizeString($_POST['category']);
    $content = sanitizeString($_POST['content']);

    queryMysql("INSERT INTO posts (title,category,content,date) VALUES('$title', '$category', '$content',now() )");
  
    echo "<p> Το άρθο καταχωρήθηκε με επιτυχία. " ;
    echo "<a href='index.php'>Πατήστε εδώ για να επιστρέψετε στην αρχική σελίδα.</a>" ;
    echo "</p>";
  }
  else
    echo "<p> Το άρθρο δεν μπορεί να καταχωρηθεί </p>";
?>

<?php require_once 'footer.html' ?>
