<?php // create.php
    require_once 'header.php' ;

  if (isset($_GET['post_id'])) $id_title = sanitizeString($_GET['post_id']);
  
  $query  = "SELECT * FROM posts WHERE id='$id_title'";
  $result = queryMysql($query);
  $num    = $result->num_rows;
  $row = $result->fetch_array(MYSQLI_ASSOC);
?>

     <h2>Ενημέρωση άρθρου άρθρου</h2>

     <!-- Φόρμα για την δημιουργία άρθρου-->
 
     <form method='post' action='update_database.php'>
        Tίτλος: <input name="title" id="title" type="text" value= '<?= $row['title'] ?>'/><br>

       Κατηγορία:
        <select name="category" id="category">
          <option <?php if($row['category'] == 'general') echo "selected='selected'"; ?> id="general" value="general">Γενικά</option>
          <option <?php if($row['category'] == 'economy') echo "selected='selected'"; ?> id="economy" value="economy">Οικονομικά</option>
          <option <?php if($row['category'] == 'science') echo "selected='selected'"; ?> id="science" value="science">Επιστήμη</option>
        </select><br>

        <TEXTAREA name="content" ROWS="3" COLS="25">
        <?= $row['content'] ?>
        </TEXTAREA>
        <input type='submit' value='Ενημέρωση άρθρου'>
        <input type="button" name="Ακύρωση" value="Ακύρωση"
onclick="window.location='post.php?post_id=<?= $id_title ?>'" />
        <input type="hidden" name="post_id" value='<?= $id_title ?>'/>
      </form>

<?php require_once 'footer.html' ?>
