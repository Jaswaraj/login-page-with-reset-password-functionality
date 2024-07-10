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

    <div class="container login-container pb-5">        
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="login-form bg-light">
                    <div class="row">
                        <div class="logo-row">
                            <img src="OditekNewLogo.png" alt="logo" class="logo">
                        </div>
                    </div>
                    <div class="text-center mb-4">
                        <h3 class="fw-bold">Register</h3>
                        <p class="text-secondary">Create an account</p>
                    </div>

                    <?php
                        if (isset($_POST["submit"])) {
                            $fullName = $_POST["fullname"];
                            $email = $_POST["email"];
                            $password = $_POST["password"];
                            $passwordRepeat = $_POST["repeat_password"];

                            $passwordHash = password_hash($password, PASSWORD_DEFAULT);

                            $errors = array();

                            if(empty($fullName) OR empty($email) OR empty($password) OR empty($passwordRepeat)){
                                array_push($errors,"All fields are required");
                            }
                            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                array_push($errors, "Email is not valid!");
                            }
                            if (strlen($password)<8) {
                                array_push($errors,"Password must be atleast 8 characters long");
                            }
                            if ($password!==$passwordRepeat) {
                                array_push($errors,"Password does not match");
                            }

                            require_once "database.php";
                            $sql = "SELECT * FROM users WHERE email = '$email'";
                            $result = mysqli_query($conn,$sql);
                            $rowCount = mysqli_num_rows($result);
                            if($rowCount>0){
                                array_push($errors,"Email already exists!");
                            }

                            if (count($errors)>0) {
                                foreach ($errors as $error) {
                                    echo "<div class='alert alert-danger'>$error</div>";
                            }
                           }else{
                            
                            $sql = "INSERT INTO users (full_name,email,password) VALUES ( ?, ?, ?)";
                            $stmt = mysqli_stmt_init($conn);
                            $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
                            if ($prepareStmt) {
                                mysqli_stmt_bind_param($stmt,"sss",$fullName, $email, $passwordHash);
                                mysqli_stmt_execute($stmt);
                                echo"<div class='alert alert-success'>You are registered succesfully.</div>";
                            }else{
                                die("Something went wrong");
                            }
                        }
                        }                        
                    ?>
                
                    <form action="registration.php" method="post">

                        <div class="form-group mb-3">                        
                            <input type="text" class="form-control" name="fullname" placeholder="Full Name" >
                        </div>

                        <div class="form-group mb-3">                        
                            <input type="email" class="form-control" name="email" placeholder="Email">
                        </div>

                        <div class="form-group mb-3">                        
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>

                        <div class="form-group">                        
                            <input type="password" class="form-control" name="repeat_password" placeholder="Repeat Password">
                        </div>

                        <div class="form-btn mt-3">
                            <input type="submit" class="btn btn-primary btn-lg w-100" value="Register" name="submit">
                        </div>
                    </form>
                
                    <div class="d-flex justify-content-between mt-2">
                        <small><a href="#">Forgot password?</a></small>
                        <small><a href="login.php">Sign In</a></small>
                    </div>
                
                </div>
            </div>
        </div>
    </div>
</body>
</html>
