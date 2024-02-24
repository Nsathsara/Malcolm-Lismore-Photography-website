<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Malcolm lismore</title>
    <mata name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="simplelightbox-master/dist/simple-lightbox.css">

</head>
<body>

  <!--main-->
  <section class="section-three">
        <div class="container">
            <div class="weddings-gallery">

                <?php

                include "./db/db.php";


                $query = "SELECT * FROM `file`"; 
                $result = $conn->query($query);

                if ($result->num_rows > 0) {

                    while ($row = $result->fetch_assoc()) {
                        $photoPath = $row["path"];
                        $photoId = $row["id"];



                        //html part
                        echo "  
                        <div class='single-img'>
                            <img src='$photoPath' alt='Wedding Images'>
                            <div class='single-img-content'>
                                <h3>Beautiful Weddings</h3>
                            </div>
                        </div>
                        ";

                        echo "<form action='delete_photo.php' method='post'>";
                        echo "<input type='hidden' name='photo_id' value='$photoId'>";
                        echo "<input type='submit' name='delete' value='Delete'>";
                        echo "</form>";
                        echo "</div>";
                    }
                    } else {
                    echo "No photos found.";
                    }
                ?>
                
                </div>
            </div>
        </div>
    </section>


</body>