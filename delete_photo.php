<?php
 include "./db/db.php";



if(isset($_POST['delete']) && isset($_POST['photo_id'])) {

    $photoId = $_POST['photo_id'];

    $deleteQuery = "DELETE FROM `file` WHERE id = $photoId"; 
    if($conn->query($deleteQuery) === TRUE) {
        echo "Photo deleted successfully.";

        header("Location: admin.php"); //navigate to another page
    } else {
        echo "Error deleting photo: " . $conn->error;
    }
}
?>
