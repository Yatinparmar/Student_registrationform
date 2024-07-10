<?php
include "dbconnect.php";

// Check if the ID is set in the URL
if (isset($_GET['id'])) {
    // Sanitize the ID to prevent SQL injection
    $stu_id = mysqli_real_escape_string($conn, $_GET['id']);

    // Construct the SQL query to delete the record
    $sql = "DELETE FROM studentdetails WHERE id ='$stu_id'";
    
    // Execute the query
    if ($conn->query($sql) === TRUE) {
        // If deletion is successful, redirect to index.php with a success message
        header('Location: index.php?message');
        exit(); // Ensure no further code execution after redirection
    } else {
        // If an error occurs during deletion, display the error message
        echo "Error:" . $sql . "<br>" . $conn->error;
    }
} else {
    // If ID is not set in the URL, display an error message
    echo "ID parameter is missing.";
}
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['confirm'] == 'Yes') {
        delete_record($_REQUEST['id']); // From GET or POST variables
    }
    redirect($_POST['referer']);
}
?>

<form action="delete.php" method="post">
    Are you sure?
    <input type="submit" name="confirm" value="Yes">
    <input type="submit" name="confirm" value="No">

    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
    <input type="hidden" name="referer" value="<?php echo $_SERVER['HTTP_REFERER']; ?>">
</form>
