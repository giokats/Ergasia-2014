<?php // import.php
  require_once 'header.php' ;
?>


<?php 
  
  if (isset($_POST['post_id']) && $loggedin)
  {
    $post_id =sanitizeString($_POST['post_id']);
    $title = sanitizeString($_POST['title']);
    $category = sanitizeString($_POST['category']);
    $content = sanitizeString($_POST['content']);

    queryMysql("UPDATE posts SET title = '$title', category = '$category', content = '$content', date = now() WHERE id = '$post_id'");
  
    echo "<h2> Το άρθο ενημερώθηκε με επιτυχία. " ;
    echo "<a href='index.php'>Πατήστε εδώ για να επιστρέψετε στην αρχική σελίδα.</a>" ;
    echo "</h2>";
  }
  else
    echo "<h2> Το άρθρο δεν μπορεί να ενημερωθεί </h2>";
?>

<?php require_once 'footer.html' ?>
