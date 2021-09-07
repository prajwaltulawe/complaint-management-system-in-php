<?php

$error = false;
if($_SERVER["REQUEST_METHOD"] == "POST") {
include 'partials/_dbconnect.php';
$loginid = $_POST["loginid"];
$password = $_POST["linpasssword"];
    $linsqlquery = "Select * from admin where loginid ='$loginid';";
    $result = mysqli_query($connectionquery, $linsqlquery);
    $num = mysqli_num_rows($result);
        if ( $num == 1 ){
          while ($passhash = mysqli_fetch_assoc($result)) {
          if (password_verify($password, $passhash['passwd'] )) {
          session_start();
          $_SESSION['loggedin'] = true ;
          $_SESSION['username'] = $loginid;
          header("location: adminpanel.php");
            }
            else {
              $error = "Incorrect Login Id or Password.";
            }
          }
       }
  }
?>

<html>
<head>
  <?php
  include 'partials/required.html'
  ?>
</head>
<body>
<body>
  <header class="header is-general" id="header">
      <div class="container">
        <div class="header__wrap">
          <a class="logo" href="complaintregistrartion.php" title="Online Complaint Management System"><span>Online Complaint Management</span></a>
        </div>
    </div></header>

    <?php

    if( $error ){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $error.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
    }
    ?>    

    <div class="container" style="display: flex;flex-direction: column;align-items: center; padding-top: 6%;">
  <form style="display: flex; display: contents;" method="POST">
    <div class="mb-3 col-md-4" style="font-size: 17px;line-height: 28px;">
      <label for="exampleInputEmail1" class="form-label">Login id</label>
      <input type="text" class="form-control" id="exampleInputEmail1" name="loginid" aria-describedby="emailHelp" required>
    </div>
    <div class="mb-3 col-md-4" style="font-size: 17px;line-height: 28px;">
      <label for="exampleInputPassword1" class="form-label">Password</label>
      <input type="password" class="form-control" id="exampleInputEmail1" name="linpasssword" aria-describedby="emailHelp" required>
    </div>  
    <div class="mb-3 col-md-4" style="font-size: 10px;line-height: 17px; align-content: center;">
      <label for="exampleInputPassword1" class="form-label"></label>
  <button type="submit" class="btn btn-primary col-md-12">Login</button>
  </div>
  </form>
    </div>
  </html>