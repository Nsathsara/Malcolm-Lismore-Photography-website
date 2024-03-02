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
    <title>Malcolm lismore</title>
    <mata name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="simplelightbox-master/dist/simple-lightbox.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
     <!--header-->
    <!--header-->
    <header class="header">
        <div class="nav-section">
            <div class="brand-and-navBtn">
                <span class="brand-name">
                    MALCOLM LISMORE
                </span>

            </div> 

            <form action="./logout.php" method="post">
                <button type="submit" class="btn btn-dark p-1 m-3">Log Out</button>
            </form>
            
        </div>

        <div class="container about">
            <div class="about-content">
                <div class="about-img flex img-2">
                    <img src="/Images/about-img.jpg" alt="photograper img">
                </div>
                <h2>I'm Malcolm Lismore</h2>
                <h3>Photograper</h3>
                <div class="admin-quotes">
                    "Photograper is a way of feeling, of touching, of loving. What you have caught on film is captured forever... It 
                    remember little things, long after you have forgotten everything." <br>
                </dive>
                <dive class="quote-author">
                   <span>--Aaron Siskind--</span>
                </div>
                <p>Admin Page</p>
            </div>

        </div>

    </header>
    <!--end of header-->



 

  <!--main-->
  
        <div>
            <div>

            <a href="./upload.php"><button type="button" class="btn btn-primary mx-5 my-5">Add New Photo</button></a>


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

                        

                        
                    ?>
                      <!--html part-->
                      <!--boostrap -->        
                        <div class="col"> <div class='card mb-3' style='width: 18rem;'>
                            <img src=<?php echo $photoPath ?> class='card-img-top'>
                            <div class='card-body'>

                                <form action='delete_photo.php' method='post'>
                                    <input type='hidden' name='photo_id' value=<?php echo $photoId ?>>
                                    <input class='btn btn-primary m-1 mb-2' type='submit' name='delete' value='Delete'>
                                </form>
                           
                        </div>
                          </div>
                        </div>

                    <?php
                    }
                    }
                ?>

                    </div>
                    </div>
                
                </div>
            </div>
        </div>


        <div>
            <div>

            <div class="container text-center">
            <div class="row row-cols-4"> <!--boostrap-->

                <?php

                include "./db/db.php";


                $query = "SELECT * FROM `file2`"; 
                $result = $conn->query($query);

                if ($result->num_rows > 0) {

                    while ($row = $result->fetch_assoc()) {
                        $photoPath = $row["path"];
                        $photoId = $row["id"];

                        

                        //html part
                    ?>

                      <!--boostrap -->        
                        <div class="col"> <div class='card' style='width: 18rem;'></div>
                            <img src=<?php echo $photoPath ?> class='card-img-top'>
                            <div class='card-body'>
                                <h5 class='card-title'>Nature Images</h5>

                                <form action='delete_photo.php' method='post'>
                                    <input type='hidden' name='photo_id' value=<?php echo $photoId ?>>
                                    <input class='btn btn-primary' type='submit' name='delete' value='Delete'>
                                </form>
                           
                        </div>
                          
                        </div>

                    <?php
                    }
                    } 
                ?>

                    </div>
                    </div>
                
                </div>
            </div>
        </div>


    <!--end of main-->
    <!--footer start-->

    <footer class="footer">
        <div class="footer-container container">
            <div>
                <h2>Malcolm lismore</h2>
                <p>"To me, photography is an art of observation. It's about finding something interesting in an ordinary place...
                I've found it has little to do with the things you see and everything to do with the way you see them."</p>
            </div>
            <div>
                <h3>Free Subscription!</h3>
                <p>Start your journey to stunning photography with our complimentary subscription!</p>

                <div class="subs">
                    <i class="fas fa-envelope"></i>
                    <input type="email" id="email"
                    placeholder="Email Address">
                    <button type="submit">SUBSCRIBE</button>
                </div>
            </div>
        </div>
        <p>&copy; Copyright Malcolm Lismore . SIMPLE AND NICE TEMPALTE</p>
    </footer>
    <!--end of footer-->



    


</body>