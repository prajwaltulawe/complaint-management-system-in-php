<!DOCTYPE html>
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
if($_SERVER["REQUEST_METHOD"] == "POST") {
$showalert = false;
include 'partials/_dbconnect.php';
$name = htmlspecialchars($_POST["name"]);
$email = $_POST["email"];
$product = $_POST["product"];
$message = htmlspecialchars($_POST["message"]);
$enter = "INSERT INTO `complaints` (`name`, `email`, `product`, `cust_message`) VALUES ('$name', '$email', '$product', '$message');";
$result = mysqli_query($connectionquery, $enter);
          if ( $result )  {
           $showalert = true ;
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <strong>Your complaint has been registered..!</strong> Our backend team will soon reply you.
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>;';
          }
          else  {
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Sorry...! Your complaint was not registered. Please try later...</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>;'; 
          }
        
}
?>
    
<div class="container" style="display: flex;flex-direction: column;align-items: center; padding-top: 5%;">
  <form style="display: flex; display: contents;" method="POST">
    <div class="mb-3 col-md-4" style="font-size: 17px;line-height: 28px;">
      <label for="exampleInputPassword1" class="form-label">Name</label>
      <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" required>
    </div>
    <div class="mb-3 col-md-4" style="font-size: 17px;line-height: 28px;">
      <label for="exampleInputPassword1" class="form-label">Email</label>
      <input type="email" class="form-control" name="email" id="Email" aria-describedby="emailHelp" required>
    </div> 
    <div class="mb-3 col-md-4" style="font-size: 17px;line-height: 28px;">
      <label for="exampleInputEmail1" class="form-label">Product</label>
      <select class="form-select" id="product" name="product" aria-describedby="emailHelp" required>
      <option selected disabled value="">Choose...</option>
      <option>Mobile</option>
      <option>Television</option>
      <option>Computer</option>
    </select>
    </div> 
    <div class="mb-3 col-md-4" style="font-size: 17px;line-height: 28px;">
  <label for="exampleFormControlTextarea1" class="form-label">Your Complaint</label>
  <textarea class="form-control" name="message" id="message" aria-describedby="emailHelp" required></textarea>
</div>
<div class="mb-3 col-md-4" style="font-size: 10px;line-height: 17px; align-content: center;">
      <label for="exampleInputPassword1" class="form-label"></label>
  <button type="submit" class="btn btn-primary col-md-12">Register my complaint</button>
  </div>
  </form>
  </div>
    </main>
</html>