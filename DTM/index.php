<!-- CONNECTION ESTABLISHMENT WITH DATABASE -->
<?php
$username = 'root';
$password = '';
$servername = $_SERVER['SERVER_NAME'];
$dbname = 'vacc_box';

$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn){
	die('<p style="color:red;"><b> COULD NOT CONNECT TO THE DATABASE <br> Please check the Username, Password and, Database Name and try again.</b></p> '.mysqli_connect_error());
}
/*else{ ?><p style='color:lightgreen; background-color:black;'><?php
	echo 'connection successful';?></p><?php
}*/
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>MobiVial</title>
		<link rel="stylesheet" href="style_index.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

		<script src="https://cdn.anychart.com/releases/8.0.1/js/anychart-core.min.js"></script>
      	<script src="https://cdn.anychart.com/releases/8.0.1/js/anychart-pie.min.js"></script>

		  <!-- Bootstrap CSS -->
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<!-- Option 1: Bootstrap Bundle with Popper -->
		<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
	</head>
	<body>
		<div class='right'>
			<div class='container-fluid heading2'>
        <div class="row">
          <div class="col-6">
            <p class="dashboard">DASHBOARD</p>
          </div>
        </div>
			</div>
&nbsp
			  <div class="mainContent container">
				  <div class = "row">
			  		<div class= "col text-center">
					    Hey there!
			  		</div>
          </div>
          <div class = "row">
            <div class= "col text-center">
					    Welcome to <span class = "welcome" style= "font-size:3rem;">MobiVial</span>
			  		</div>
				  </div>
          &nbsp
          <div class = "row">
            <div class= "col text-center prompt">
					    What would you like to do?
			  		</div>
				  </div>

          <div class="row justify-content-center">

            <div class="col-sm-6 col-md-3">
              <!-- Opens a Modal asking for adding box-->        
              <button class='submit_button' data-toggle='modal' data-target='#addBox' id="myBtn">Add a Box</button>
            </div>
          

          <div class="col-sm-6 col-md-3">
              <!-- Opens a Modal asking for deleting box-->        
            <button class='submit_button' data-toggle='modal' data-target='#deleteBox' id="myBtn">Delete a Box</button>
          </div>

          <div class="col-sm-6 col-md-3">
              <!-- Opens a Modal asking for adding box-->        
              <button class='submit_button' data-toggle='modal' data-target='#checkStatus' id="myBtn">Check Status</button>
          </div>

          <div class="col-sm-6 col-md-3">
            <!-- Opens a Modal asking for adding box-->        
            <button class='submit_button' data-toggle='modal' data-target='#checkout' id="myBtn">Checkout box</button>
          </div>

          </div>

          <div class="row justify-content-center">

            <div class="col-sm-6 col-md-3">
              <!-- Opens a Modal asking for adding box-->        
              <button class='track_button' onclick="window.location.href='';">Track a box</button>
            </div>
          </div>

          </div>

          <div id="addBox" class="modal">
						<!-- Modal content -->
						<div class="addBoxContent">
							<p style="margin-top: 0px;">Enter Box Details</p>
							<form method='post' style="padding:0" action='<?php echo $_SERVER['PHP_SELF'];?>'>
                <div class="container">   

                  <div class='row justify-content-center'>
                    <div class="col-sm-12">
                      <label for='box_id'>Box ID</label><br>
                      <input type='text' name='box_id' placeholder='Enter Box ID' required/><br>
                    </div>
                  </div>

                  <div class='row justify-content-center'>
                    <div class="col-sm-12">
                      <label for='availability'>Availability Status</label><br>
                      <select name='availability' required>
                        <option value="" style="color:grey">Select One</option>
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                      </select><br><br>
						        </div>
                  </div>

                  <div class='row justify-content-center'>
                    <!--<input type='hidden' name='SL1' value='<?php #echo $new_key; ?>'/>-->
                    <div class="col-md-6 col-sm-12 boxAdd">
                      <button type="submit"  class='AddNewBox' name="addBox">Enter</button>                                  
                    </div>		
                    <div class="col-md-6 col-sm-12 boxAdd">					
                      <button type="button" class='AddNewBoxCancel' data-dismiss="modal">Cancel</button>		
                    </div>			
                  </div>				
                </div>
							</form>
			      </div>
		      </div>

        <div id="deleteBox" class="modal">
						<!-- Modal content -->
						<div class="deleteBoxContent">
							<p style="margin-top: 0px;">Enter box ID to delete data </p>
							<form method='post' style="padding:0" action='<?php echo $_SERVER['PHP_SELF'];?>'>
                <div class="container">
                  <div class='row justify-content-center' style="margin-bottom:25px">
                    <!--<label for='box_id'>Box ID</label><br>-->
                    <input type='text' name='box_id' placeholder='Enter Box ID'><br><br>
                  </div>
                  <div class='row justify-content-center'>
                    <div class="col-md-4 col-sm-12 deleteBox">
                      <button type="submit"  class='deleteBoxConfirm' name="deleteBox">Delete</button>                                  
                    </div>		
                    <div class="col-md-4 col-sm-12 deleteBox">					
                      <button type="button" class='deleteBoxCancel' data-dismiss="modal">Cancel</button>		
                    </div>			
                  </div>				
                </div>
							</form>
						</div>
		    </div>

        <div id="checkStatus" class="modal">
						<!-- Modal content -->
						<div class="checkStatusContent">
							<p style="margin-top: 0px;">Enter box ID to check status </p>
							<form method='post' style="padding:0" action='<?php echo $_SERVER['PHP_SELF'];?>'>
                <div class="container">
                  <div class='row justify-content-center' style="margin-bottom:25px">
                    <!--<label for='box_id'>Box ID</label><br>-->
                    <input type='text' name='box_id' placeholder='Enter Box ID'><br><br>
                  </div>
                  <div class='row justify-content-center'>
                    <div class="col-md-4 col-sm-12 deleteBox">
                      <button type="submit"  class='checkStatusConfirm' name="checkStatus">Check</button>                                  
                    </div>		
                    <div class="col-md-4 col-sm-12 deleteBox">					
                      <button type="button" class='checkStatusCancel' data-dismiss="modal">Cancel</button>		
                    </div>			
                  </div>				
                </div>
							</form>
						</div>
		    </div>

        <div id="checkout" class="modal">
						<!-- Modal content -->
						<div class="checkoutContent">
							<p style="margin-top: 0px;">Enter Box Details</p>
							<form method='post' style="padding:0" action='<?php echo $_SERVER['PHP_SELF'];?>'>
                <div class="container">   

                  <div class='row justify-content-center'>
                    <div class="col-sm-12">
                      <label for='box_id'>Box ID</label><br>
                      <input type='text' name='box_id' placeholder='Enter Box ID' required/><br>
                    </div>
                  </div>

                  <div class='row justify-content-center'>
                    <div class="col-sm-12">
                      <label for='availability'>Availability Status</label><br>
                      <select name='availability' required>
                        <option value="" style="color:grey">Select One</option>
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                      </select><br><br>
						        </div>
                  </div>

                  <div class='row justify-content-center'>
                    <!--<input type='hidden' name='SL1' value='<?php #echo $new_key; ?>'/>-->
                    <div class="col-md-6 col-sm-12 boxAdd">
                      <button type="submit"  class='AddNewBox' name="addBox">Enter</button>                                  
                    </div>		
                    <div class="col-md-6 col-sm-12 boxAdd">					
                      <button type="button" class='AddNewBoxCancel' data-dismiss="modal">Cancel</button>		
                    </div>			
                  </div>				
                </div>
							</form>
			      </div>
		      </div>

			<footer>
					<div class='copyrights'>
					&#169; VITHAN_A_RAI
					</div>
			</footer>
		</div>	
	</body>
</html>

<?php
if(isset($_POST["addBox"])){
	$box_id = $_POST["box_id"];
  $availability = $_POST["availability"];
  $check=mysqli_query($conn,"SELECT * FROM box_info WHERE box_id='$box_id'");
		$checkrows=mysqli_num_rows($check);
	
	   if($checkrows>0) {
		  echo "<script>alert('A box with similar ID already exists !!Please try another ID');</script>";
	   } else {  
	
		$sql = "INSERT INTO `box_info` (`box_id`, `availability`) VALUES ('$box_id', '$availability');";
	
		$result = mysqli_query($conn, $sql);
	
		if($result){
			echo "<script>alert('Form submitted successfully'); location.href=''; </script>";
		}
		else{
			echo "<script>alert('Failed to submit form'); location.href=''; </script>";
		}
	}
}

if(isset($_POST["deleteBox"])){
	$box_id = $_POST["box_id"];
   $sql3 = "DELETE FROM box_info WHERE box_id = $box_id;";
      $result3 = mysqli_query($conn, $sql3);
      if($result3)
      {
        echo "<script>alert('Box data deleted successfully'); location.href=''; </script>";
      }
      else
      {
        echo 'Failed to delete data';
      }
}

if(isset($_POST["checkStatus"])){
	$box_id = $_POST["box_id"];
  $check=mysqli_query($conn,"SELECT availability FROM box_info WHERE box_id='$box_id'");
  if ($check->num_rows > 0) {
    // output data of each row
    while($row = $check->fetch_assoc()) 
    {	
      $str = implode($row);
		 if(strcmp($str, 'Active')==0){
			  echo "<script>alert('The box is active'); location.href=''; </script>";
		  }
		  elseif(strcmp ($str,'Inactive')==0){
			echo "<script>alert('The box is inactive'); location.href=''; </script>";
		}
    else{
      echo "<script>alert('Please enter a valid ID'); location.href=''; </script>";
    }
  }
}
}

?>