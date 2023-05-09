<?php
  include 'connect.php';
  if (!isset($_SESSION['admin'])) {
    header('location: adminlogin.php');
  }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
    <link rel="shortcut icon" href="icon.png" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#"> <b>WELCOME <span>ADMIN</span></b></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            
           
          </ul>
          <form class="form-inline my-2 my-lg-0">
          <button type="button" class="btn btn-dark"><a href="adminlogout.php" style="color:white;text-decoration: none;">Logout</a></button>
          </form>
        </div>
      </nav>
      <div class="page-content p-5" id="content">
        <?php
        $sql = "SELECT * FROM details";
        $result = mysqli_query($conn, $sql);
        echo "<div class='container text-white'><center><table class='table'><tr><th>ID</th><th>Name</th><th>Mobile</th><th>Email</th><th>GST Number</th><th>Contact</th></tr>";
                $count=1;
                while($row = mysqli_fetch_assoc($result))
                {
                    echo "<tr><td>".$count."</td><td>".$row['name']."</td><td>".$row['mobile']."</td><td>".$row['email']."</td><td>".$row['gst']."</td><td><button class='btn btn-submit'><b><a style='text-decoration: none; color: black;' href='https://mail.google.com/mail/?view=cm&fs=1&su=MESSAGE FROM ADMIN&to=".$row['email']."' target='_blank'>Contact</a></b></button></td></tr>";
                    $count++;
                }
                echo "</table><center></div>";
        ?>
      
             
       
    </div>
    </div>
      

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="script.js"></script>
</body>
</html>

