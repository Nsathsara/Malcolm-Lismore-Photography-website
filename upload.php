<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photo Upload</title>
</head>
<body>

     <?php
     include "./db/db.php";

     if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
         if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0) {
             $target_dir = "uploads/"; 
             $target_file = $target_dir . basename($_FILES["photo"]["name"]);
             $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); 

             $qur = "INSERT INTO `file` VALUES(0, '$target_file');";

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
       <div class="upload-form">
         <h2>Upload Photo</h2>
         <form action="upload.php" method="post" enctype="multipart/form-data">
             <input type="file" name="photo" accept="image/*">
             <input type="submit" value="Upload">
         </form>
       </div>
</body>
</html>
