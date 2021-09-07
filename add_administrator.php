<?php
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'partials/_dbconnect.php';
    $loginid = $_POST["loginid"];
    $linpassword = $_POST["linpasssword"];
    $lincpasswordcnfrm = $_POST["linpassswordcnfrm"];

    $existSql = "SELECT * FROM `admin` WHERE loginid = '$loginid';";
    $result = mysqli_query($connectionquery, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if($numExistRows > 0){
        $showError = "Login Id Already Exists... Please use an another Login Id.";
    }

    else{
        if(($linpassword == $lincpasswordcnfrm)){
            $hash = password_hash($linpassword, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `admin` ( `loginid`, `passwd`) VALUES ('$loginid', '$hash')";
            $result = mysqli_query($connectionquery, $sql);
            if ($result){
                $showAlert = true;
            }
        }
            else{
                $showError = "Passwords do not match";
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
  <header class="header is-general" id="header">
      <div class="container">
        <div class="header__wrap">
          <a class="logo" href="complaintregistrartion.php" title="Online Complaint Management System"><span>Online Complaint Management</span></a>
          <nav class="nav">
            <a href="admin_login.php">Administrator Login</a>
          </nav>
          </div>
      </div>
    </header>

    <?php
    if($showAlert){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your account was created sucessfully, you can login now..!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div> ';
    }
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $showError.'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div> ';
    }
    ?>
    <div class="container" style="display: flex;flex-direction: column;align-items: center; padding-top: 6%;">
    <?php     
  session_start();
  if(isset($_SESSION['username']) && $_SESSION['loggedin'] = true ) {
    echo '<form style="display: flex; display: contents;" method="POST">
    <div class="mb-3 col-md-4" style="font-size: 17px;line-height: 28px;">
      <label for="exampleInputEmail1" class="form-label">Login id</label>
      <input type="text" class="form-control" id="exampleInputEmail1" name="loginid" aria-describedby="emailHelp" required>
    </div>
    <div class="mb-3 col-md-4" style="font-size: 17px;line-height: 28px;">
      <label for="exampleInputPassword1" class="form-label">Password</label>
      <input type="password" class="form-control" id="exampleInputEmail1" name="linpasssword" aria-describedby="emailHelp" required>
    </div>  
    <div class="mb-3 col-md-4" style="font-size: 17px;line-height: 28px;">
      <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
      <input type="password" class="form-control" id="exampleInputEmail1" name="linpassswordcnfrm" aria-describedby="emailHelp" required>
    </div>  
    <div class="mb-3 col-md-4" style="font-size: 10px;line-height: 17px; align-content: center;">
      <label for="exampleInputPassword1" class="form-label"></label>
  <button type="submit" class="btn btn-primary col-md-12">Login</button>
  </div>
  </form>';
    
  }
else { 
  header("location: admin_login.php");
}
?>
    </div>
  </html>