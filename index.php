
    <!-- //show the message data is deleted -->
    <!-- delete -->
    <?php
    if (isset($_GET['message'])) {
        // Display the message
        echo '<script>alert("Record deleted successfully.")</script>';
    }
    ?>
    <!-- show the message data are Updated -->
    <!-- update -->
    <?php
    if (isset($_GET['message2'])) {
        // Display the message
        echo '<script>alert("Record Updated successfully.")</script>';
    }
    ?>
    <!-- new record created successfully -->
    <!-- insert -->
    <?php
    if (isset($_GET['message3'])) {
        // Display the message
        echo '<script>alert("New Record Created Successfully")</script>';
    }
    ?>


    <!-- //connect the Database -->
    <?php
    include "dbconnect.php";
    ?>

    <!-- creating the table -->
    <!DOCTYPE html>
    <html>
    <head>
        <title>Student Database</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">

    </head>
    <body>

        <div class="container-fluid">
    <h2>Student Details</h2>

    <a class="btn btn-primary" name="submit" value="submit" href="stu_registration.php">Add New</a>
    <table class="table">
        <thead>
            <tr>
            <th>ID</th>
            <th>F_Name</th>
            <th>L_Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Gender</th>
            <th>Department</th>
            <th>Address1</th>
            <th>Address2</th>
            <th>City</th>
            <th>State</th>
            <th>Country</th>
            <th>Zip code</th>
            <th>Mobile_No</th>
            <th>Profile IMG</th>
            <th>Resume</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
            <!-- show the all inserted data -->
            <?php
                    $sql = "SELECT * FROM studentdetails";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
            ?>
                        <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['firstName']; ?></td>
                        <td><?php echo $row['lastName']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['password']; ?></td>
                        <td><?php echo $row['gender']; ?></td>
                        <td><?php echo $row['department']; ?></td>
                        <td><?php echo $row['streetAddress1']; ?></td>
                        <td><?php echo $row['streetAddress2']; ?></td>
                        <td><?php echo $row['city']; ?></td>
                        <td><?php echo $row['state']; ?></td>
                        <td><?php echo $row['country']; ?></td>
                        <td><?php echo $row['Zip']; ?></td>
                        <td><?php echo $row['Number']; ?></td>
                        <td><img src="./img/<?php echo $row['image'] ?>" width=100px alt=""></td>
                        <td><a href="./document/<?php echo$row['resume']?>"><?php echo $row['resume']?> </a></td>
                        
                        <td><a class="btn btn-success" name="update" value="update" href="stu_registration.php?id=<?php echo $row['id']; ?>">Update</a> <a class="btn btn-danger me-1" name="delete" value="delete" href="delete.php?id=<?php echo $row['id']; ?>"onclick="return confirm('Are you sure you want to delete?')">Delete</a> </td>
                        </tr>
            <?php       }
                }
            ?>
    
    </form>
        </tbody>
    </table>
        </div>
    </body>
    </html>
    <script>
    function confirmDelete(delUrl) {
    if (confirm("Are you sure you want to delete")) {
    document.location = delUrl;
    }
    }
</script>

