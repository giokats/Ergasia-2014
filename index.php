<?php 
  require_once 'header.php' ;
  //Για να εμφανιστούν οι 5 τελευταίες σελίδες στην αρχική σελίδα
  if (isset($_GET['post_category'])) $post_category = sanitizeString($_GET['post_category']);
  
  if (isset($post_category))
    $query  = "SELECT * FROM posts WHERE category='$post_category' ORDER BY date DESC limit 5";
  else
    $query  = "SELECT * FROM posts ORDER BY date DESC limit 5";

  $result = queryMysql($query);
  $num    = $result->num_rows;
?>


<?php 
  if($num>0)
  {
    if (!isset($post_category))
    {
      echo "<h1>Καλώς ήλθατε στην σελίδα μας</h1>";
      echo "<p> Τα τελευταία νέα της επικαιρότητας:</p>";
    }  
    echo "<ul>";
      for ($j = 0 ; $j < $num ; ++$j)
      {
        $row = $result->fetch_array(MYSQLI_ASSOC);

        echo "<li><a href='post.php?post_id=";
        echo $row['ID'];
        echo "'>";
        echo $row['title'];
        echo "</a></li>" ;
      }
    echo "</ul>";
    }
    else
    {
      echo "<h1>Δεν υπάρχουν άρθρα</h1>";
    }

?>

<?php 
  if ($loggedin)
  {
    echo "<br>" ;
    echo "<br>" ;
    echo "<form method='post' action='create.php";
    echo "'>";
    echo "<input type='submit' value='Δημιουργία άρθρου'>";
    echo "</form>";
  }
?>

<?php require_once 'footer.html' ?>

