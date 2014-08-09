<?php 
  //require_once 'php/functions.php' ;
  require_once 'header.php' ;

  if (isset($_GET['post_id'])) $id_title = sanitizeString($_GET['post_id']);
  
  $query  = "SELECT * FROM posts WHERE id='$id_title'";
  $result = queryMysql($query);
  $num    = $result->num_rows;
  $row = $result->fetch_array(MYSQLI_ASSOC);
?>


  <section>

    <div id="content">
      <h1><?= $row['title']?></h1>
	<p> <?= $row['content'] ?></p>
        
<?php 
    if ($loggedin)
    {
      echo "<form method='post' action='delete.php?post_id=";
      echo $row['ID'];
      echo "'>";
      echo "<input type='submit' value='Διαγραφή άρθρου'>";
      echo "</form>";
    }
?>


    </div>


  </section>

  </div>

<?php require_once 'footer.html' ?>
</div>
</body>
</html>
