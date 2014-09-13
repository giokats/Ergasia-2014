<?php // create.php
  require_once 'header.php' ;

  if (isset($_GET['post_category'])) $post_category = sanitizeString($_GET['post_category']);

?>

  <script type="text/javascript">
    function Validation(form)
    {
      if (O('title').value.length > 0)
        return confirm('Είστε σίγουρος ότι θέλετε να καταχωρίσετε το άρθρο;');
      else
      {
        alert("Συμπληρώστε τον τίτλο του άρθρου!");
        return false;
      }
    }
  </script>

     <h2>Δημιουργία άρθρου</h2>

     <!-- Φόρμα για την δημιουργία άρθρου-->
     <form method='post' onsubmit="return Validation(this);" action='import.php'>
        Tίτλος: <input name="title" id="title" type="text"/><br>

       Κατηγορία:
        <select name="category" id="category">
          <option <?php if($post_category == 'general') echo "selected='selected'"; ?> id="general" value="general">Γενικά</option>
          <option <?php if($post_category == 'economy') echo "selected='selected'"; ?> id="economy" value="economy">Οικονομικά</option>
          <option <?php if($post_category == 'science') echo "selected='selected'"; ?> id="science" value="science">Επιστήμη</option>
        </select><br>

        <TEXTAREA name="content" ROWS="3" COLS="25">
         Γράψτε εδώ το κείμενο σας...
        </TEXTAREA>
        <input type='submit' value='Δημιουργία άρθρου'>
        <input type="button" name="Ακύρωση" value="Ακύρωση"
onclick="window.location='index.php?post_category=<?= $post_category ?>'" />
      </form>

<?php require_once 'footer.html' ?>
