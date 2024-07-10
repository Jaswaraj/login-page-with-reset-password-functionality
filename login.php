<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  
    <link rel="stylesheet" href="style.css">
</head>
<body>   
     

<div class="container login-container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4">
            <div class="login-form bg-light">
                <div class="row">
                    <div class="logo-row">
                <img src="OditekNewLogo.png" alt="logo" class="logo">
            </div>
        </div>
                <div class="text-center mb-4">
                <h3 class="fw-bold">Log In</h3>
                <p class="text-secondary">Get access to your account</p>
                </div>

                <?php
                if (isset($_POST["login"])) {
                    $email = $_POST["email"];
                    $password = $_POST["password"];
                    require_once "database.php";
                    $sql = "SELECT * FROM users WHERE email = '$email'";
                    $result = mysqli_query($conn, $sql);
                    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    if ($user){
                        if (password_verify($password, $user["password"])) {
                            header("Location: index.php");
                            die();
                            
                        }else{
                            echo "<div class='alert alert-danger'>Password does not match</div>";
                        }

                    }else{
                        echo "<div class='alert alert-danger'>Email does not match</div>";
                    }
                }

                ?>
                
                <form action="login.php" method="post">
                    <div class="form-group mb-3">                        
                        <input type="email" class="form-control" name="email" placeholder="Enter Email" required>
                    </div>

                    <div class="form-group">                        
                        <input type="password" class="form-control" name="password" placeholder="Enter Password" required>
                    </div>
                    <input type="submit" value="Login" class="btn btn-primary btn-lg w-100 mt-3" name="login">
                </form>
                <div>
                    <small><a href="forgot-password.php">Forgot password?</a></small>
                </div>
                <div class="text-center mt-2">
                    <small><a href="registration.php">Don't have an account? Sign up</a></small>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>

