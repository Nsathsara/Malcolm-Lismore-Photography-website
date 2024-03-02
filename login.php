<?php
session_start();

include "./db/db.php";


// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if both email and password are provided
    if(isset($_POST['email']) && isset($_POST['password'])) {
        // Retrieve user input
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        $qur = "SELECT * from register_db";

        $result = $conn->query($qur);

         if($row = $result->fetch_assoc()){

            if($email == $row['email'] && $password == $row['password']){
              
              $_SESSION['admin'] = 'nipun';

              header("Location: ./admin.php");

            }
        }else{

            $error = "Email or password incorrect";
        }


        $result = $conn->query($qur);
        
        // Check if email and password match a user in your database
        if ($email === 'user@example.com' && $password === 'password') {
            // If the user is authenticated, store user data in session or set a cookie
            $_SESSION['user'] = $email;
            // Redirect to a dashboard or profile page
            header("Location: dashboard.php");
            exit();
        } else {
            // If authentication fails, show an error message
            $error = "Invalid email or password. Please try again.";
        }
    } else {
        // If email or password is not provided, show an error message
        $error = "Please provide both email and password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <h2 class="text-center mb-4">Login</h2>
                <?php if(isset($error)): ?>
                    <div class="alert alert-danger"><?php echo $error; ?></div>
                <?php endif; ?>
                <form method="POST">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
