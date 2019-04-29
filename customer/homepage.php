<!doctype html>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


    <title>Online canteen booking</title>

    
  </head>
  <body>

<br><br><br><br>

         <div class="container">
         
        <ul class="nav justify-content-end">
          <li class="nav-item">
           <a class="nav-link active" href="#">Order</a>
          </li>
          <li class="nav-item">
           <a class="nav-link" href="http://localhost/online_campus_canteen/enquiry.php">Enquiry</a>
          </li>

        </ul>
        
        <br><br>
         <div class="row justify-content-center"> 
         <form class="col-9" name="details">
         
           
           
           <div class="form-group row"> 
             <div class="col-3">
           </div> 
             <label for="staticEmail" class="col-3 col-form-label" >Select Hostel Canteen</label>
             <div class="col-3">
             <select class="form-control "  id="hostel" name="hostel"
             
                  <?php
 
                       session_start();

                       $dbhost = 'localhost';
                       $dbuser = 'root';
                       $dbpass = 'pratikwagh1995';
   
                       $conn = mysqli_connect($dbhost, $dbuser, $dbpass,'online_canteen_booking');
   
                       if(! $conn ) {
                                 die('Could not connect: ' . mysql_error());
                       }
    
                       $orderid = $_SESSION["orderid"];
    
                        $sql = "SELECT * FROM customer_order_mapping WHERE order_id='$orderid'";
    
                        $result = mysqli_query($conn,$sql);
    
                        $row = mysqli_num_rows($result);

                        if($row>=1)
                         {
                           echo ' disabled=disabled ';
                         }

                      ?>
             
             />
               <option value="Hostel 1">Hostel 1</option>
               <option value="Hostel 2">Hostel 2</option>
               <option value="Hostel 3">Hostel 3</option>
               <option value="Hostel 4">Hostel 4</option>
               <option value="Hostel 5">Hostel 5</option>
               <option value="Hostel 6">Hostel 6</option>
               <option value="Hostel 7">Hostel 7</option>
               <option value="Hostel 8">Hostel 8</option>
               <option value="Hostel 9">Hostel 9</option>
               <option value="Hostel 10">Hostel 10</option>
               <option value="Hostel 11">Hostel 11</option>
               <option value="Hostel 12">Hostel 12</option>
               <option value="Hostel 13">Hostel 13</option>
               <option value="Hostel 14">Hostel 14</option>
               <option value="Hostel 15">Hostel 15</option>   
               <option value="Hostel 16">Hostel 16</option>             
             </select>  
             </div>
           </div> 
           
           <div class="form-group row">  
            <div class="col-3">
           </div> 
             <label for="staticEmail" class="col-3 col-form-label">Select Food</label>
             <div class="col-3">
             <select class="form-control" placeholder="Select Food" name="food" id="food">
               <option value="Biryani">Biryani</option>
               <option value="Paratha">Paratha</option>
               <option value="Maggi">Maggi</option>
               <option value="Franky">Franky</option>
               <option value="Rice">Fried Rice</option>
             </select>              
             </div>
           </div>                
                  
           <div class="form-group row">
           <div class="col-3">
           </div> 
             <label for="inputQuantity" class="col-3 col-form-label">Quantity</label>
             <div class="col-3">
                <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Quantity">
             </div>
           </div>  
           
        </form>
        </div>
   <br>
        <div class="col-12">
        <center>
        <button class="btn btn-success" id="pressed"">Submit</button>
        <a class="btn btn-primary" href="http://localhost/online_campus_canteen/viewcart.php" role="button">View Cart</a>
        </center>
        </div>

       </div>
       <script>
$(document).ready(function() {
	$('#pressed').on('click', function() {
		$("#hostel").attr("disabled", "disabled");
		var hostel = $('#hostel').val();
	//	alert(hostel);
		var food = $('#food').val();
	//	alert(food);
		var quantity = $('#quantity').val();
	//	alert(quantity);
		
		if(hostel!="" && food!="" && quantity!=""){
			$.ajax({
				url: "orderbooking.php",
				type: "POST",
				data: {
					hostel: hostel,
					food: food,
					quantity: quantity,
									
				},
				cache: false,
				success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
				}
			});
		}
		else{
			alert('Please fill all the field !');
		}
	});
});
</script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    

  </body>
</html>
