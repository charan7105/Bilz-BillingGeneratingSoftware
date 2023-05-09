<?php
  include 'connect.php';
?>
<html>
    <head>
        <title>Sign up</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" />
        <link rel="stylesheet" href="login.css">
    </head>
    <body> 
        <form method="post" action="" class="login">
            <header>SIGNUP</header>
            <div class="field">
                <span class="fa fa-user"></span>
                <input type="text" name="name" placeholder="Store Name" required>
            </div>
            <div class="field">
                <span class="fa fa-envelope"></span>
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="field">
              <span class="fa fa-phone"></span>
              <input type="phone" name="mob" placeholder="Mobile No." required>
            </div>
            <div class="field">
              <span class="fa fa-lock"></span>
              <input type="password" name="pass" placeholder="Password" required>
            </div>
            <div class="field">
              <span class="fa fa-vcard-o"></span>
              <input type="text" name="gst" placeholder="GSTIN / UIN" >
            </div>
            <input type="submit" class="submit" name="submit" value="CREATE ACCOUNT">
            
            <span class="logn-form-copy">Already have an account? <a href="login.php" class="login-form__sign-up">Login</a></span>
      </form>
      <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $name = $_POST['name'];
            $email=$_POST['email'];
            $mobile=$_POST['mob'];
            $pass=$_POST['pass'];
            $gst=$_POST['gst'];
            $query = "SELECT * FROM details WHERE email='$email'";
            $result = mysqli_query($conn, $query)or die($mysqli_error($conn));
            $num = mysqli_num_rows($result);
            if ($num!=0) {
              echo '<script>alert("Email Already exists")</script>';
            }else{
              $sql = "INSERT INTO details(name,email,mobile,password,gst) VALUES ('$name','$email','$mobile','$pass','$gst')";
              $result = mysqli_query($conn, $sql);
              header('location: login.php');
            }
        }
      ?>
    </body>
  </html>


