<?php include "./db/db.php" ?>

<?php 

    session_start();

    if(!isset($_SESSION['admin'])){
        header("Location: ./login.php");
        exit();
    }
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photo Upload</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>

     <?php
     include "./db/db.php";

     if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
         if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0) {
             $target_dir = "uploads/"; 
             $target_file = $target_dir . basename($_FILES["photo"]["name"]);
             $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
             
             $type = $_POST['type'];

             $qur = "INSERT INTO `file` VALUES(0, '$target_file', '$type');";

             $result = $conn -> query($qur);

             if($result === TRUE) {
             }else{
                 $errors =  "Unsuccess";
             }


             $check = getimagesize($_FILES["photo"]["tmp_name"]);
             if ($check !== false) {

                 if (file_exists($target_file)) {
                     echo "Sorry, the file already exists.";
                 } else {

                     if ($_FILES["photo"]["size"] > 5 * 1024 * 1024) {
                         echo "Sorry, the file is too large.";
                     } else {

                         if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png" && $imageFileType != "gif") {
                             echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                         } else {

                             if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
                                 echo "The file " . htmlspecialchars(basename($_FILES["photo"]["name"])) . " has been uploaded.";
                             } else {
                                 echo "Sorry, there was an error uploading your file.";
                             }
                         }
                     }
                 }
             } else {
                 echo "File is not an image.";
             }   
         } else {
             echo "Error uploading file.";
         }
     }
     ?>
       
       <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <h2 class="text-center mb-4">Upload photo</h2>
                
                 <form action="upload.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="file" class="form-label">Upload photo</label>
             <input class="form-control" type="file" id="file" name="photo" accept="image/*">
             
             </div>
            <label for="cars">Choose photo type:</label>
            <select class="form-select" aria-label="Default select example" name="type" id="type">
                <option value="wedding">Wedding</option>
                <option value="nature">Nature</option>
            </select>
            <br><br>
             <input class="btn btn-primary" type="submit" value="Upload">
         </form>


            </div>
        </div>
    </div>
</body>
</html>
