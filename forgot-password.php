<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
   
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
                        <h3 class="fw-bold">Forgot Password</h3>
                        <p class="text-secondary fw-bold">Enter email</p>
                        <form method="post" action="send-password-reset.php">
                            
                            <input type="email" name="email" id="email">

                            <input type="submit" value="Send" class="btn btn-primary btn-lg w-100 mt-3" name="Send">

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>    

   

        

</body>
</html>