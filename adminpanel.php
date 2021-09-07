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
          <a href="add_administrator.php">Add Administrator</a>
          <a href="logout.php">Logout</a>
        </nav>
        </div>
    </div>
  </header>
<div class="container" style="display: flex;flex-direction: column;align-items: center;">
<div class="container my-5">
<table class="table" id="myTable">
<thead>
  <tr>
    <th scope="col">S.No</th>
    <th scope="col">Name</th>
    <th scope="col">Email</th>
    <th scope="col">Product</th>
    <th scope="col">Message</th>
    <th scope="col">Solution</th>
  </tr>
</thead>
<tbody>

  <?php     
  session_start();
  if(isset($_SESSION['username']) && $_SESSION['loggedin'] = true ) {
  include 'partials/_dbconnect.php';
    $sql = "SELECT * FROM `complaints`;";
    $result = mysqli_query($connectionquery, $sql);
    $sno = 0;
    while($row = mysqli_fetch_assoc($result)){

      $sno = $sno + 1;

      echo "<form action= 'adminpanel.php' method='POST'>
      <tr>
      <th scope='row'>". $sno . "</th>
      <td>". $row['name'] . "</td>
      <td>". $row['email'] . "</td>
      <td>". $row['product'] . "</td>
      <td>". $row['cust_message'] . "</td>
      <td><div class='d-grid gap-2'>
      <button class='reply btn btn-light btn-sm' id=".$row['srno']." >Reply</button>
      </div>
      </td>
    </tr>
    </form>";
  }
}
else { 
  header("location: admin_login.php");
}

if($_SERVER['REQUEST_METHOD'] == "POST")  {
  $to = $_POST["custemail"];
  $subject = "Reply from ".$_SESSION['username'];
  $email_body = "You have received a new message.\n\nHere's a solution that we have got for your complaint.\n ".$_POST["solution"];
  $headers = "From:".$_SESSION['username']."\n";
  
  if(mail($to,$subject,$email_body)) {
   echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <strong> Your reply was sended sucessfully..!</strong>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
  }
  else {
    echo '<div class="alert alert-dark alert-dismissible fade show" role="alert">
    Your reply wasn&#39;t sended..!
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
  
  }
} 
    ?>

</tbody>
</table>

</div>

</div>

 </main>
 
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Reply to</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </button>
        </div>
        <form action="adminpanel.php" method="POST">
          <div class="modal-body">
            <input type="hidden" name="snoEdit" id="snoEdit">
            <div class="form-group">
              <label for="title">Customer Name</label>
              <input type="text" class="form-control" id="custname" name="custname" aria-describedby="emailHelp" required>    
              <label for="title">Customer Email</label>
              <input type="email" class="form-control" id="custemail" name="custemail" aria-describedby="emailHelp" required>
              <label for="title">Product</label>
              <input type="text" class="form-control" id="product" name="product" aria-describedby="emailHelp"required>
              <label for="title">Customer Complaint</label>
              <input type="text" class="form-control" id="custcomp" name="custcomp" aria-describedby="emailHelp" required>
            </div>
            <div class="form-group">
              <label for="desc">Solution</label>
              <textarea class="form-control" id="solution" name="solution" rows="3" required></textarea>
            </div> 
          </div>
          <div class="modal-footer d-block mr-auto">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Send Reply</button>
          </div>
        </form>
      </div>
    </div>
  </div>

 
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
      $('#myTable').DataTable();
    });
</script>
<script> 
    rep = document.getElementsByClassName('reply');
    Array.from(rep).forEach((button) => {
      button.addEventListener("click", (e) => {
      tr = e.target.parentNode.parentNode.parentNode;
        name = tr.getElementsByTagName("td")[0].innerText;
        email = tr.getElementsByTagName("td")[1].innerText;
        prod = tr.getElementsByTagName("td")[2].innerText;
        message = tr.getElementsByTagName("td")[3].innerText;
        custname.value = name;
        custemail.value = email;
        product.value = prod;
        custcomp.value = message;
           $('#editModal').modal('toggle');
      })
    })
</script>
</html>