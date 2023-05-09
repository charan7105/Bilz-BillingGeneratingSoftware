<?php
  include 'connect.php';
?>
<html>
  <head>
      <title>LOGIN</title>
    <link rel="shortcut icon" href="icon.png" type="image/png">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" />
      <link rel="stylesheet" href="login.css">
  </head>
  <body> 
      <form method="post" action="" class="login">
          <header>ADMIN LOGIN</header>
          <div class="field">
              <span class="fa fa-user"></span>
              <input type="text" name="email" placeholder="ID">
          </div>
          <div class="field">
            <span class="fa fa-lock"></span>
            <input type="password" name="pass" placeholder="Password">
          </div>
          <!-- <div class="forgot-password">
              <a href="#">Forgot password?</a>
          </div> -->
          <input type="submit" class="submit" value="LOGIN">
          <!-- <span class="logn-form-copy">Not an admin ? <a href="login.php" class="login-form__sign-up">Login as User</a></span> -->
    </form>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $email=$_POST['email'];
            $pass=$_POST['pass'];
            if($email=="admin" && $pass=="admin"){
              $_SESSION['admin']=true;
              header('location:admin.php');
            }
        }
      ?>
  </body>
</html>

