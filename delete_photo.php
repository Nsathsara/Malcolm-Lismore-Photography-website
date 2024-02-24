<?php
 include "./db/db.php";

// Assuming $conn is your database connection

if(isset($_POST['delete']) && isset($_POST['photo_id'])) {
    $photoId = $_POST['photo_id'];
    // Delete the photo from the database
    $deleteQuery = "DELETE FROM `file` WHERE id = $photoId"; // Assuming 'id' is the primary key column
    if($conn->query($deleteQuery) === TRUE) {
        echo "Photo deleted successfully.";
    } else {
        echo "Error deleting photo: " . $conn->error;
    }
}
?>
