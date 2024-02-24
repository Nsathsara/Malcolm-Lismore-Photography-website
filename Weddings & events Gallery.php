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


    <!--header-->
    <header class="header">
        <div class="nav-section">
            <div class="brand-and-navBtn">
                <span class="brand-name">
                    MALCOLM LISMORE
                </span>
                <span class="navBtn flex">
                    <i class="fas fa-bars"></i>
                </span>
            </div> 

            <!--navgation menu-->
            <nav class="top-nav">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="nature gallery.html">Nature Gallery</a></li>
                    <li><a href="weddings & events gallery.html" class="active">Weddings & Events Gallery</a></li>
                    <li><a href="./contact.php">Contact</a></li>
                    <li><a href="./Prices.html">Prices</a></li>
                </ul>
            </nav>
            <span class="search-icon">
                <i class="fas fa-search"></i>
            </span>
        </div>

        <div class="container about">
            <div class="about-content">
                <div class="about-img flex">
                    <img src="/Images/about-img.jpg" alt="photograper img">
                </div>
                <h2>I'm Malcolm Lismore</h2>
                <h3>Photograper</h3>
                <blockquote>
                    "Photograper is a way of feeling, of touching, of loving. What you have caught on film is captured forever... It 
                    remember little things, long after you have forgotten everything."
                    <span>--Aaron Siskind--</span>
                </blockquote>
            </div>

            <div class="social-icon">
                <ul>
                    <li>
                        <a href="#"><i class="fab fa-facebook"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fab fa-pinterest"></i></a>
                    </li>
                </ul>
            </div>

        </div>
    </header>
    <!--end of header-->

    <!--main-->
    <section class="section-three">
        <div class="container">
            <div class="weddings-gallery">

                <?php
                // Assuming $conn is your database connection
                include "./db/db.php";

                // Query to retrieve photo paths from the database
                $query = "SELECT path FROM `file`"; // Assuming your table is named `file`
                $result = $conn->query($query);

                if ($result->num_rows > 0) {
                    // Loop through each row in the result set
                    while ($row = $result->fetch_assoc()) {
                        $photoPath = $row["path"];
                        // Display the photo using an <img> tag
                        // echo "<img src='$photoPath' alt='Photo'>";

                        echo "
                        <div class='single-img'>
                            <img src='$photoPath' alt='Wedding Images'>
                            <div class='single-img-content'>
                                <h3>Beautiful Weddings</h3>
                            </div>
                        </div>
                        ";
                    }
                    } else {
                    echo "No photos found.";
                    }
                ?>
                
                </div>
            </div>
        </div>
    </section>

    <!--end of main-->

    <!--footer-->
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

    <!--lightbox-->
    <script src="simplelightbox-master/dist/simple-lightbox.js"></script>




    <script src="main.js"></script>
</body>
</html>