<?php 

    include "./db/db.php"

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
                    <li><a href="weddings & events gallery.html">Weddings & Events Gallery</a></li>
                    <li><a href="./Contact.php" class="active">Contact</a></li>
                    <li><a href="./Prices.php">Prices</a></li>
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
    <section class="section-five">
        <div class="container">
            <div class="contact-top">
                <h3>CONTACT ME</h3>
                <p>Feel free to reach out to me via the contact form provided below or directly through my email or phone number, 
                as I eagerly await the opportunity to connect with you and discuss how my photography services can bring your vision to life.</p>
            </div>

            <div class="contact-middle">
                <div>
                     <span class="contact-icon">
                         <i class="fas fa-map-signs"></i>
                     </span>
                     <span>Address</span>
                     <p>Main Street - 2356, California 0043</p>
                </div>

                <div>
                    <span class="contact-icon">
                         <i class="fas fa-phone"></i>
                    </span>
                    <span>Contact Number</span>
                    <p>2455 0645 2573</p>
                </div>

               <div>
                    <span class="contact-icon">
                         <i class="fas fa-paper-plane"></i>
                    </span>
                    <span>Email</span>
                    <p>malcolmlismore@gmail.com</p>
                </div>

                <div>
                    <span class="contact-icon">
                         <i class="fas fa-globe"></i>
                    </span>
                    <span>Website</span>
                    <p>www.malcolmlismorephotography.com</p>
                </div>
            </div>

            <?php 

                $errors = "";
                $name = "";
            
                if(isset($_POST['submit'])){

                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $subject = $_POST['subject'];
                    $message = $_POST['message'];

                    $qur = "INSERT INTO messages VALUES(0, '$name', '$email', '$subject', '$message');";

                    $result = $conn -> query($qur);

                    if($result === TRUE) {
                        $errors = "successfuly added";
                    }else{
                        $errors =  "Unsuccess";
                    }
                }
            
                echo $errors;
            ?>

            
            <div class="contact-bottom">
                <span><?php echo $name  ?></span>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class = "form">
                    <input type="text" name="name" id="name" placeholder="Your Name" >
                    <input type="email" name="email" id="email" placeholder="Your Email">
                    <input type="text" name="subject" id="subject" placeholder="Subject">
                    <textarea rows = "9" name="message" id="message" placeholder="Message"></textarea>
                    <button class='btn' name='submit' type='submit'>submit</button>
                </form>

                <!--map-->
                <div>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6539399.485787481!2d-129.3826449631014!3d36.84
                    089164187813!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808fb9fe5f285e3d%3A0x8b5109a227086f55!2sCaliforn
                    ia%2C%20USA!5e0!3m2!1sen!2slk!4v1708686590693!5m2!1sen!2slk" width="100%" height="600px" style="border:0;"
                     allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

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
                <?php 

                    echo "connected";
                
                ?>
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




    <script src="main.js"></script>
</body>
</html>