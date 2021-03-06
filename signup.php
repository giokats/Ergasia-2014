<?php // signup.php
  require_once 'header.php';
?>
  <!-- Από το βιβλίο Learning PHP, MySQL, JavaScript, CSS & HTML5: A Step-By-Step Guide to Creating Dynamic Websites-->
  <script>
    function checkUser(user)
    {
      // Αφαιρούμε τις προηγούμενες τιμές που τυχόν υπάρχουν
      if (user.value == '')
      {
        O('info').innerHTML = ''
        return
      }

      // Ελέγχουμε αν είναι διαθέσιμο το συγκεκριμένο username καλώντας το checkuser.php
      params  = "user=" + user.value
      request = new ajaxRequest()
      request.open("POST", "checkuser.php", true)
      request.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
      request.setRequestHeader("Content-length", params.length)
      request.setRequestHeader("Connection", "close")

      // Συμπλήρωση του info
      request.onreadystatechange = function()
      {
        if (this.readyState == 4)
          if (this.status == 200)
            if (this.responseText != null)
              O('info').innerHTML = this.responseText
      }
      request.send(params)
    }

    
    //Συνάρτηση που χρησιμεύει για να είναι το site compatible με πολλούς explorers
    function ajaxRequest()
    {
      try { var request = new XMLHttpRequest() }
      catch(e1) {
        try { request = new ActiveXObject("Msxml2.XMLHTTP") }
        catch(e2) {
          try { request = new ActiveXObject("Microsoft.XMLHTTP") }
          catch(e3) {
            request = false
      } } }
      return request
    }
  </script>

  <h3>Εισάγετε τα στχοιεία σας</h3>

<?php
  $error = $user = $pass = "";
  if (isset($_SESSION['user'])) destroySession();

  if (isset($_POST['user']))
  {
    $user = sanitizeString($_POST['user']);
    $pass = sanitizeString($_POST['pass']);

    if ($user == "" || $pass == "")
      $error = "Συμπληρώστε όλα τα πεδία<br><br>";
    else
    {
      $result = queryMysql("SELECT * FROM members WHERE user='$user'");

      if ($result->num_rows)
        $error = "Διαλέξτε άλλο Username<br><br>";
      else
      {
        queryMysql("INSERT INTO members VALUES('$user', '$pass')");
        //Redirection to main page
        header("Location:login.php");
        exit();
      }
    }
  }

?>
  <form method='post' action='signup.php'> 
    <span class='error'><?= $error ?></span>
    <span class='fieldname'>Username</span>
    <input type='text' maxlength='16' name='user' value= '<?= $user ?>' onBlur='checkUser(this)'><span id='info'></span><br>
    <span class='fieldname'>Password </span>    
    <input type='text' maxlength='16' name='pass' value='<?= $pass ?>'><br><br>
    <span class='fieldname'>&nbsp;</span>
    <input type='submit' value='Δημιουργία Λογαριασμού'>
    </form>


<?php require_once 'footer.html' ?>
