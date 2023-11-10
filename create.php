<?php
	include "configure.php";

    if(isset($_POST['submit'])){
        $Person_ID = $_POST['Person_ID'];
        $First_Name = $_POST['First_Name'];
        $Last_Name = $_POST['Last_Name'];
        $email = $_POST['email'];
        $number = $_POST['number'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $zip_code = $_POST['zip_code'];
        $website = $_POST['website'];
        $radio1 = $_POST['radio1'];
        $proj_des = $_POST['proj_des'];

        $sql = "INSERT INTO author (Person_ID, First_Name, Last_Name, email, address, number, city, state, zip_code, website, radio1, proj_des ) VALUES ('$Person_ID', '$First_Name', '$Last_Name', '$email', '$address','$number', '$city', '$state', '$zip_code', '$website','$radio1', '$proj_des')";

	$result = $conn->query($sql);

	if($result == TRUE){
        echo "NEW USER ADDED!";
        }
        else{
        echo "ERROR!".$sql."<br>". $conn->error;
        }
        $conn->close();
}	
?>
<!DOCTYPE html>
<html>
<head?>
<link rel="stylesheet" href="style.css">    


</head>
<body>
<div class="login-container">
<form action="" method="POST">
        <legend><strong>SIGN IN</strong></legend>
        <fieldset>
        <br></br>
        <div class="input-box">
        <label >Person_ID</label>
        <i class="fa fa-user"></i>
        <input type="text" name="Person_ID" >
        </div>

        <div class="input-box">
        <label>First Name</label>
        <i class="fa fa-user"></i>
        <input type="text" name="First_Name">
        </div>


        <div class="input-box">
        <label>Last Name</label>
        <i class="fa fa-user"></i>
        <input type="text" name="Last_Name">
        </div>

        <div class="input-box">
        <label>Email</label>
       <i class="fa fa-envelope"></i>
        <input type="text" name="email">
        </div>

        <div class="input-box">
        <label for="address">Address:</label>
        <i class="fa fa-house"></i>
         <input type="text" id="address" name="address" required>
         </div>

         <div class="input-box">
         <label for="number">Phone Number:</label>
         <i class="fa fa-phone"></i>
         <input type="tel" id="number" name="number"  placeholder= "123-456-7890"required>
         </div>

         <div class="input-box">
            <label for="city">City:</label>
            <i class="fa fa-house"></i>
            <input type="text" id="city" name="city" placeholder="City" required>    
         </div>

         <div class="input-box">
            <label for="state">Select a State:</label>
            <i class="fa-solid fa-flag-usa"></i>
            <select id="state" name="state" required>
                <option value="" disabled selected>Select a state</option>
                <option value="AL">Cagayan</option>
                <option value="AK">Palawan</option>
                <option value="AZ">Bataan</option>
                <option value="AR">Quezon</option>
                <option value="CA">Davao del Sur</option>
                <option value="CO">Laguna</option>
                <option value="CT">South Cotabato</option>
                <option value="DE">Pampangga</option>
                <option value="FL">Ilocos Norte</option>
                <option value="GA">Pangasinan</option>
                <option value="HI">Bulacan</option>
                <option value="ID">Isabela</option>
                <option value="IL">National Capital Region (Manila)</option>
                <option value="IN">Davao Oriental</option>
                <option value="IA">Agusan del Sur</option>
                <option value="KS">Camarines Sur</option>
                <option value="KY">Zamboanga del Sur</option>
                <option value="LA">Negros Oriental</option>
                <option value="ME">Occidental Mindoro</option>
                <option value="MD">Negros Occidental</option>
                <option value="MA">Bukidnon</option>
                <option value="MI">Misamis Oriental</option>
            </select>
         </div>

         <div>
            <div class="input-box">
            <label for="zip_code">ZIP Code:</label>
            <i class="fa-solid fa-house"></i>
        <input type="text" id="zip_code" name="zip_code" placeholder="12345" required>
         </div>

         <div>
            <div class="input-box">
            <label for="website">Website/Domain Name:</label>
            <i class="fa-solid fa-globe"></i>
        <input type="url" id="website" name="website" placeholder="website or Domain name" required>
         </div>

         <label> Do you have hosting?</label>
        <div class="form-check">
        <input type="radio" class="form-check-input" id="radio1" name="radio1" value="YES" checked>
      <label class="form-check-label" for="radio1">YES</label>
      <input type="radio" class="form-check-input" id="radio1" name="radio1" value="NO">
      <label class="form-check-label" for="radio1">NO</label>
       </div>
         <div>
            <label for="proj_des">Project Description:</label>
            <i class="fa-solid fa-pen"></i>
            <textarea id="proj_des" name="proj_des" rows="4" placeholder="Enter your project description here" required></textarea>
        </div>
            
         <br>
         <input type="submit" name="submit" value="submit">
        </br>

</fieldset>

</form>
</div>
<script src="https://kit.fontawesome.com/78e8bf16a1.js" crossorigin="anonymous"></script>

</html>

<?php
    include "configure.php";

    if(isset($_POST['update'])){
        $Person_ID = $_POST['Person_ID'];
        $First_Name = $_POST['First_Name'];
        $Last_Name = $_POST['Last_Name'];
        $email = $_POST['email'];

        $sql = "UPDATE author SET Person_ID ='$Person_ID', First_Name ='$First_Name', Last_Name='$Last_Name', email='$email' WHERE Person_ID='$Person_ID'";

        $result = $conn->query($sql);

    if($result == TRUE){
            echo " User updated successfully!";
        }
        else{
            echo "ERROR!". $conn->error;
        }
    }

    if(isset($_GET['Person_ID'])){
        $Person_ID = $_GET['Person_ID'];
        $sql = "SELECT * FROM 'author' WHERE 'Person_ID'='$Person_ID'";
        $result = $conn->query($sql);

        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
          
			  $Person_ID  = $row['Person_ID']; 
			  $First_Name = $row['First_Name']; 
			  $Last_Name = $row['Last_Name']; 
              $email = $row['email'];
            }

            

        
        }

    }
?>
<!DOCTYPE html>
<body>
    <form>
    <fieldset>
        <h2> UPDATE</h2>
        <form action="" method="POST">
        <legend> UPDATE: </legend>
        
</br>
<div class="input-box">
        Person ID:<br>
        <input type="text" name="Person_ID">
</div>
</br>

    <div class="input-box">
        FIRST NAME:<br>
        <input type="text" name="First_Name">
</br>
</div>
 
<div class="input-box">

        LAST NAME:<br>
        <input type="text" name="Last_Name">
</br>
</div>

<div class="input-box">
        email:<br>
        <input type="text" name="email">
</br>
</div>
        <input type="submit" value="update" name="update"
        </fieldset>
        </form>
    </html>


    <?php
    include "configure.php";


    if(isset($_POST['delete'])){
        $Person_ID = $_POST['Person_ID'];
    

 

       
      
      // sql to delete a record
      $sql = "DELETE FROM author WHERE Person_ID='$Person_ID'";
      
      if ($conn->query($sql) === TRUE) {
        echo "User deleted successfully";
      } else {
        echo "Error deleting  User: " . $conn->error;
      }
      
      $conn->close();
  
    }
   

?>




<!DOCTYPE html>
<html>
        <h2> DELETE USER </h2>
        <form action="" method="POST">
        <fieldset>

        Person ID:<br>
        <input type="text" name="Person_ID">
        
</br>
 

        <input type="submit" value="delete" name="delete"
       </fieldset>
        </form>
</body>
</html>


