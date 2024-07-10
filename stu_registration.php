<?php
include "dbconnect.php";

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    if (isset($_POST['submit'])) {
        $stu_id = $_POST['id'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        // $password = $_POST['password'];
        $gender = isset($_POST['gender']) ? $_POST['gender'] : "";
        $department = $_POST['department'];
        $streetAddress1 = $_POST['StreetAddress1'];
        $streetAddress2 = $_POST['StreetAddress2'];
        $city = $_POST['City'];
        $state = $_POST['State'];
        $country = $_POST['Country'];
        $zip = $_POST['Zip'];
        $number = $_POST['Number']; 
        $profileImgName = $_FILES['image']['name'];
        $resumeFileName = $_FILES['resume']['name']; 
        if(isset($_POST['id']) && !empty($_POST['id'])) {
            // Update existing record
            $stu_id = $_POST['id'];
            $sql = "UPDATE `studentdetails` SET `firstname`='$firstName', `lastName`='$lastName', `email`='$email', `gender`='$gender', `department`='$department', `StreetAddress1`='$streetAddress1', `StreetAddress2`='$streetAddress2', `City`='$city', `State`='$state', `Country`='$country', `Zip`='$zip', `Number`='$number', `image`='$profileImgName', `resume`='$resumeFileName' WHERE `id`='$stu_id'";
    } else {
        // Insert new record
        $sql = "INSERT INTO studentdetails (id, firstname, lastname, email, gender, department, StreetAddress1, StreetAddress2, City, State, Country, Zip, Number, resume, image) VALUES ('$stu_id', '$firstName', '$lastName', '$email', '$gender', ' $department', '$streetAddress1', ' $streetAddress2', '$city', ' $state', '$country', '$zip', '$number',' $resumeFileName', '$profileImgName')";
    }
        $result = $conn->query($sql);

        if ($result === TRUE) {
            echo '<script>alert("Record updated successfully..")</script>';
            header('Location: index.php?message2');
            exit; 
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
    ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/custom.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    <h1>Student Details</h1>
    <div class="formvalidation">
        <form id="validate" name="formm" method="post" action="" enctype="multipart/form-data">
<?php
 include 'dbconnect.php'; 
 if (isset($_GET['id'])) {  
     $stu_id = $_GET['id'];
     $sql = "SELECT * FROM studentdetails WHERE id='$stu_id'";
     $result = $conn->query($sql);
     if ($result->num_rows > 0) {
         while ($row = $result->fetch_assoc()) {
             $stu_id = $row['id'];
             $firstName = $row['firstName'];
             $lastName = $row['lastName'];
             $email = $row['email'];
            //  $password = $row['password'];
             $gender = $row['gender'];  
             $department = $row['department'];
             $streetAddress1 = $row['streetAddress1'];
             $streetAddress2 = $row['streetAddress2'];
             $city = $row['city'];
             $state = $row['state'];
             $country = $row['country'];
             $zip = $row['Zip'];
             $number = $row['Number'];
             $profileImgName = $row['image'];    
             $resumeFileName = $row['resume'];
         }
     }
 }
 
?>
        <input type="hidden" name="id" value="<?php echo $stu_id; ?>"> 
            <div id="index_row">
                <label for="firstName">First Name:*</label><input type="text" name="firstName" id="firstName" value="<?php echo $firstName; ?>" required /><br>
            </div>
            <div id="usercheck" style="color: red;"> </div>
            <div id="index_row">
                <label for="lastName">Last Name:*</label> <input type="text" name="lastName" id="lastName" value="<?php echo  $lastName; ?>" required/> <br>
            </div>
            <div id="usercheck2" style="color: red;"> </div>
            <div id="index_row">
                <label>Email:* </label><input type="email" name="email" id="email" value="<?php echo  $email; ?>" required/>
            </div>
            <div id="errEmail" style="color: red;"> </div>
            <!-- <div id="index_row">
                <label>Password:* </label><input type="password" id="psswd" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"  required/>
            </div>
            <div id="errpswd" style="color: red;"> </div> -->
            <div id="index_row">
                Gender:*
                <input type="radio" name="gender" id="male" value="male"  value="male" <?php if($gender == "male") echo "checked"; ?>>
                <label for="male">Male</label>
                <input type="radio" name="gender" id="female" value="female" value="female" <?php if($gender == "female") echo "checked"; ?>>
                <label for="female">Female  </label>
                    <div id="r1">
                    </div>
            </div>
            <div id="errgender" style="color: red; display: none;"></div>
            <div id="index_row">
            <label>Department:* </label>
            <select name="department" id="department">
            <option value="">Select Your Department</option>
            <option value="MCA" <?php if($department == "MCA"){ 
                                    echo "selected";
                                     } 
                                    ?>
                                    >MCA</option>
            <option value="MBA" <?php if($department == "MBA"){
                                  echo "selected";
                                     } 
                                    ?>
                                 >MBA</option>
            <option value="BCA" <?php if($department == "BCA"){
                                        echo "selected"; 
                                        }
                                    ?>
                                    >BCA</option>
            <option value="BBA" <?php if($department == "BBA"){
                                    echo "selected"; 
                                    }
                                    ?>
                                    >BBA</option>
        </select>
        </div>
            <div id="errselect" style="color: red;"> </div>
            <div id="index_row">
                <label>Address 1:* </label>
                <input name="StreetAddress1" type="text" id="add1" value="<?php echo $streetAddress1; ?>" required/>
            </div>
            <div id="Address" style="color: red;"> </div>
            <div id="index_row">
                <label>Address 2: </label>
                <input name="StreetAddress2" type="text" id="add2" value="<?php echo $streetAddress2; ?>" required/>
            </div>
            <div id="index_row">
                <label>City:* </label>
                <input name="City" type="text" id="City" value="<?php echo $city; ?>" required/>
            </div>
            <div id="errcity" style="color: red;"> </div>
            <div id="index_row">
                <label>State:* </label>
                <input name="State" type="text" id="State" value="<?php echo $state; ?>" required/>
            </div>
            <div id="errstate" style="color: red;"> </div>
            <div id="index_row">
                <label>
                    Country:* </label>
                <input name="Country" type="text" id="Country" value="<?php echo $country; ?>" required/>
            </div>
            <div id="errcountry" style="color: red;"> </div>
            <div id="index_row">
                <label>Postal Code:* </label>
                <input name="Zip" type="text" id="zip" maxlength="30" value="<?php echo $zip; ?>" required/>
            </div>
            <div id="errzipcode" style="color: red;"> </div>
            <div id="index_row">
                <label>Mobile Number:* </label>
                <input name="Number" type="text" id="number" maxlength="30" value="<?php echo $number; ?>" required/>
            </div>
            <div id="errnum" style="color: red;"> </div>
            <div id="index_row">
                <label>Upload Profile img:* </label>
                <input name="image" type="file" id="fileName" value="<?php echo $profileImgName; ?>" required/>
            </div>
            <div id="errimg" style="color: red;"> </div>
            <div id="index_row">
                <label>Upload Your Resume:* </label>
                <input name= "resume" type="file"  id="myFile2" value="<?php echo $resumeFileName; ?>" required/>
            </div>
            <div id="errresume" style="color: red;"> </div>
            <div class="buttn">
                <button type="submit" id="Submit" name="submit" value="update">Submit</button>
                </div>
            </form>
        </div>
        <script src="./CSS/javascript/custom.js"></script>
</body>
</html>
<?php
} else {
include "dbconnect.php";
// Check if form is submitted
if (isset($_POST['submit'])) {
    $stu_id = $_POST['id'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = isset($_POST['gender']) ? $_POST['gender'] : "";
    $department = $_POST['department'];
    $streetAddress1 = $_POST['StreetAddress1'];
    $streetAddress2 = $_POST['StreetAddress2'];
    $city = $_POST['City'];
    $state = $_POST['State'];
    $country = $_POST['Country'];
    $zip = $_POST['Zip'];
    $number = $_POST['Number']; 
    $profileImgName = $_FILES['image']['name'];
    $resumeFileName = $_FILES['resume']['name']; 
    

    $sql = "INSERT INTO studentdetails (id, firstname, lastname, email, password, gender, department, StreetAddress1, StreetAddress2, City, State, Country, Zip, Number, resume, image) VALUES ('$stu_id', '$firstName', '$lastName', '$email', '$password', '$gender', ' $department', '$streetAddress1', ' $streetAddress2', '$city', ' $state', '$country', '$zip', '$number',' $resumeFileName', '$profileImgName')";

    $result = $conn->query($sql);

    if ($result === TRUE) {
        echo '<script>alert("New Record Created Successfully")</script>';
        header('Location: index.php?message3');
        exit; 
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }   
}

$conn->close();
?>

<html>
<head>
    <meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/custom.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    <h1>Student Details</h1>
    <div class="formvalidation">
        <form id="validate" name="formm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <div id="index_row">
                <label for="firstName">First Name:*</label><input type="text" name="firstName" id="firstName"  required /><br>
            </div>
            <div id="usercheck" style="color: red;"> </div>
            <div id="index_row">
                <label for="lastName">Last Name:*</label> <input type="text" name="lastName" id="lastName"  required/> <br>
            </div>
            <div id="usercheck2" style="color: red;"> </div>
            <div id="index_row">
                <label>Email:* </label><input type="email" name="email" id="email" required/>
            </div>
            <div id="errEmail" style="color: red;"> </div>
            <div id="index_row">
                <label>Password:* </label><input type="password" id="psswd" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required/>
            </div>
            <div id="errpswd" style="color: red;"> </div>
            <div id="index_row">
                Gender:*
                <input type="radio" name="gender" id="male" value="male">
                <label for="male">Male</label>
                <input type="radio" name="gender" id="female" value="female">
                <label for="female">Female  </label>
                    <div id="r1">
                    </div>
            </div>
            <div id="errgender" style="color: red; display: none;"></div>
            <div id="index_row">
                <label>Department:* </label>
                <select name="department" id="department">
                    <option value="">Select Your Department</option>
                    <option value="MCA">MCA</option>
                    <option value="MBA">MBA</option>
                    <option value="BCA">BCA</option>
                    <option value="BBA">BBA</option>
                </select>
            </div>
            <div id="errselect" style="color: red;"> </div>
            <div id="index_row">
                <label>Address 1:* </label>
                <input name="StreetAddress1" type="text" id="add1"  required/>
            </div>
            <div id="Address" style="color: red;"> </div>
            <div id="index_row">
                <label>Address 2: </label>
                <input name="StreetAddress2" type="text" id="add2" required/>
            </div>
            <div id="index_row">
                <label>City:* </label>
                <input name="City" type="text" id="City" required/>
            </div>
            <div id="errcity" style="color: red;"> </div>
            <div id="index_row">
                <label>State:* </label>
                <input name="State" type="text" id="State"  required/>
            </div>
            <div id="errstate" style="color: red;"> </div>
            <div id="index_row">
                <label>
                    Country:* </label>
                <input name="Country" type="text" id="Country"  required/>
            </div>
            <div id="errcountry" style="color: red;"> </div>
            <div id="index_row">
                <label>Postal Code:* </label>
                <input name="Zip" type="text" id="zip" maxlength="30"  required/>
            </div>
            <div id="errzipcode" style="color: red;"> </div>
            <div id="index_row">
                <label>Mobile Number:* </label>
                <input name="Number" type="text" id="number" maxlength="30" required/>
            </div>
            <div id="errnum" style="color: red;"> </div>
            <div id="index_row">
                <label>Upload Profile img:* </label>
                <input name="image" type="file" id="fileName" required/>
            </div>
            <div id="errimg" style="color: red;"> </div>
            <div id="index_row">
                <label>Upload Your Resume:* </label>
                <input name= "resume" type="file"  id="myFile2"  required/>
            </div>
            <div id="errresume" style="color: red;"> </div>
            <div class="buttn">
                <button type="submit" id="Submit" name="submit" value="delete">Submit</button>
                </div>
            </form>
        </div>
        <script src="./CSS/javascript/custom.js"></script>

</body>
</html>
<?php
}
?>
    
<?php
    function createUser($email){
   $sql = "SELECT count(email) FROM studentdetails WHERE email='$email'" ;

   $result = mysql_result(mysql_query($sql),0) ;

   if( $result > 0 ){
    die( "There is already a user with that email!" ) ;
   }//end if
}
?>