<?php // create.php
    require_once 'header.php' ;
?>

     <h2>Δημιουργία άρθρου</h2>

     <!-- Φόρμα για την δημιουργία άρθρου-->
     <form method='post' action='import.php'>
        Tίτλος: <input name="title" id="title" type="text"/><br>

       Κατηγορία:
        <select name="category" id="category">
          <option selected="selected" id="general" value="general">Γενικά</option>
          <option id="economy" value="economy">Οικονομικά</option>
          <option id="science" value="science">Επιστήμη</option>
        </select><br>

        <TEXTAREA name="content" ROWS="3" COLS="25">
         Γράψτε εδώ το κείμενο σας...
        </TEXTAREA>
        <input type='submit' value='Δημιουργία άρθρου'>

      </form>

<?php require_once 'footer.html' ?>
