<?php // login.php
  require_once 'header.php';

?>

  <h2>Παρακαλώ εισάγετε το Username και το κωδικό σας </h2>

<?php

  $error = $user = $pass = "";

  if (isset($_POST['user']))
  {
    $user = sanitizeString($_POST['user']);
    $pass = sanitizeString($_POST['pass']);
    
    //Έλεγχος αν έχουν συμπληρωθεί όλα τα πεδία
    if ($user == "" || $pass == "")
        $error = "<span class='error'>Πρέπει να συμπληρώσετε όλα τα πεδία </span><br><br>";
    else
    {
      $result = queryMySQL("SELECT user,pass FROM members
        WHERE user='$user' AND pass='$pass'");

      if ($result->num_rows == 0)
      {
        $error = "<span class='error'>Λάθος Username ή Password</span><br><br>";
      }
      else
      {
        $_SESSION['user'] = $user;
        $_SESSION['pass'] = $pass;

        //Redirection to main page
        header("Location:index.php");
        exit();
      }
    }
  }


?>

  <form method='post' action='login.php'>
    <?=$error?>
    Username: <input type='text maxlength='16' name='user' value=<?= $user ?> ><br>
    Password: <input type='password maxlength='16' name='pass' value=<?= $pass ?>><br>
    <span class='fieldname'>&nbsp;</span>
    <input type='submit' value='Login'>
    </form>
  <br>

  <p>Δεν έχεις λογαριασμο;   <a href='signup.php'>Δημιουργία τώρα ...</a></p>


<?php require_once 'footer.html' ?>

