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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>

  <!--main-->
  
        <div>
            <div>

            <a href="./upload.php"><button type="button" class="btn btn-primary mx-5 my-5">Add new photo</button></a>


            <div class="container text-center">
            <div class="row row-cols-4"> <!--boostrap-->

                <?php

                include "./db/db.php";


                $query = "SELECT * FROM `file`"; 
                $result = $conn->query($query);

                if ($result->num_rows > 0) {

                    while ($row = $result->fetch_assoc()) {
                        $photoPath = $row["path"];
                        $photoId = $row["id"];

                        

                        //html part
                    ?>

                      <!--boostrap -->        
                            <div class="col"> <div class='card' style='width: 18rem;'>
                            <img src=<?php echo $photoPath ?> class='card-img-top'>
                            <div class='card-body'>
                                <h5 class='card-title'>Card title</h5>
                                <p class='card-text'>Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                                <form action='delete_photo.php' method='post'>
                                    <input type='hidden' name='photo_id' value=<?php echo $photoId ?>>
                                    <input class='btn btn-primary' type='submit' name='delete' value='Delete'>
                                </form>
                           
                        </div>
                          
                        </div>
                        </div>

                    <?php
                    }
                    } else {
                    echo "No photos found.";
                    }
                ?>

                    </div>
                    </div>
                
                </div>
            </div>
        </div>
    


</body>