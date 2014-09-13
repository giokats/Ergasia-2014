<?php 
  require_once 'header.php' ;
  //Για να εμφανιστούν οι 5 τελευταίες σελίδες στην αρχική σελίδα
  if (isset($_GET['post_category'])) $post_category = sanitizeString($_GET['post_category']);
  
  if (isset($post_category) && !empty($post_category) )
    $query  = "SELECT * FROM posts WHERE category='$post_category' ORDER BY date DESC limit 5";
  else
    $query  = "SELECT * FROM posts ORDER BY date DESC limit 5";

  $result = queryMysql($query);
  $num    = $result->num_rows;
?>


<?php 
  if($num>0)
  {
    if (!isset($post_category) || empty($post_category) )
    {
      echo "<h2>Καλώς ήλθατε στην σελίδα μας</h2>";
      echo "<p> Τα τελευταία νέα της επικαιρότητας:</p>";
    }
    else if( $post_category =="general")
    {
      echo "<h2>Γενικά νέα</h2>";
    }
    else if( $post_category =="economy")
    {
      echo "<h2>Οικονομικά νέα</h2>";
    }
    else if( $post_category =="science")
    {
      echo "<h2>Επιστημονικά νέα</h2>";
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
      echo "<h2>Δεν υπάρχουν άρθρα</h2>";
    }

?>

<?php 
  if ($loggedin)
  {
    echo "<br>" ;
    echo "<br>" ;
    echo "<form method='post' action='create.php?post_category=";
    if (isset($post_category)) echo $post_category;
    echo "'>";
    echo "<input type='submit' value='Δημιουργία άρθρου'>";
    echo "</form>";
  }
?>

<?php require_once 'footer.html' ?>

