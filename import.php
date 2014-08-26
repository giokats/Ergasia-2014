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
  
    echo "<h2> Το άρθο καταχωρήθηκε με επιτυχία. " ;
    echo "<a href='index.php'>Πατήστε εδώ για να επιστρέψετε στην αρχική σελίδα.</a>" ;
    echo "</h2>";
  }
  else
    echo "<h2> Το άρθρο δεν μπορεί να καταχωρηθεί </h2>";
?>

<?php require_once 'footer.html' ?>
