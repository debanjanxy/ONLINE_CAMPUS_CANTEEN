<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Online canteen booking</title>
    
  </head>
  <body>

    
    <br><br><br>
    
    
<?php
  session_start();
   
   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = 'pratikwagh1995';
   
 //  echo"HI";
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass,'online_canteen_booking');

   $orderid=$_SESSION["orderid"];
   $emailid=$_SESSION["email"];
   
 
   $sql = "SELECT * FROM customer_order WHERE order_id='$orderid'";

   $result = mysqli_query($conn, $sql);

   
echo "<div class=\"container\">
<a class=\"btn btn-primary float-right\" href=\"http://localhost/online_campus_canteen/homepage.php\" role=\"button\">Back</a>
<br><br>
  <table class=\"table\">
  <thead class=\"thead-dark\">
    <tr>
      <th scope=\"col\">#</th>
      <th scope=\"col\">Order-Id</th>
      <th scope=\"col\">Email-ID</th>
      <th scope=\"col\">Food</th>
      <th scope=\"col\">Quantity</th>
      <th scope=\"col\">Booking Address</th>
      <th scope=\"col\">Delete</th>      
    </tr>
  </thead>";

while($row = mysqli_fetch_array($result))
{
echo "  <tbody>
         <tr>";
echo "<td>" . $row['sno'] . "</td>";         
echo "<td>" . $orderid . "</td>";
echo "<td>" . $emailid . "</td>";
echo "<td>" . $row['food']  . "</td>";
echo "<td>" . $row['quantity'] . "</td>";
echo "<td>" . $row['hostelno'] . "</td>";
echo "<td>    <form method=\"post\" action=\"deleteitem.php\">
              <input type=\"submit\" name=\"action\" value=\"Delete\"/>
              <input type=\"hidden\" name=\"id\" value=\"" . $row['sno'] . " \"/>
              </form>
      </td>";
echo "</tr>
     </tbody>";
}
echo "</table>";

mysqli_close($con);

?>


<br><br><br>

<br>
 
    <form method="POST" action="successfullyordered.php" class="">
      <label for="inputAddress">Address</label>
      <input type="text" id="inputAddress" name="address" class="form-control" aria-describedby="passwordHelpBlock">
      <br>
      <label for="inputInstruction">Any Instructions to be given</label>
      <input type="text" id="inputInstruction" name="instructions" class="form-control" aria-describedby="passwordHelpBlock">
      <br>
      <center>
      <button type="submit" class="btn btn-primary" name="login">Order</button>
      </center>
      
    </form>



</div>


    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>


