<?php 


    include "./include/config.php";

    session_start();

    if(isset($_POST["submit"])){
        $email = $_POST["email"];
        $pass = $_POST["pass"];


        $login_query = "SELECT * FROM `members` WHERE email = '$email' AND pass = '$pass'";

        $run_query = mysqli_query($conn, $login_query);


        
        if(mysqli_num_rows($run_query) > 0){
            $row = mysqli_fetch_assoc($run_query);
            $_SESSION["user_id"] = $row["id"];
            header("location:profile.php");
        }else{
            $msg[] = "Incorrect email or password";
        }
    }

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="shortcut icon" href="./img/logo (1).png" type="image/x-icon">

    <!-- boostrap css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- fontawesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- local css -->
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <!-- header -->
    <header class="bg-danger fixed-top">
        <div class="container">
            <nav class="navbar navbar-expand-sm navbar-dark">

                <a class="navbar-brand d-flex" href="">
                    <img class="img-fluid logo" src="./img/logo (1).png" alt="">
                </a>
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>


                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                  <ul class="navbar-nav ml-auto">
                    <li class="nav-item px-2"><a class="nav-link text-white" href="../index.html">Home</a></li>
                    <li class="nav-item px-2"><a class="nav-link text-white" href="../index.html#about">About Us</a></li>
                    <li class="nav-item px-2"><a class="nav-link text-white" href="../index.html#members">Our Donor</a></li>
                    <li class="nav-item px-2"><a class="nav-link text-white" target="_blank" href="https://forms.gle/jzfJP76cfYnsZuS9A">Join as Donor</a></li>
                  </ul>
                </div>
            </nav>
        </div>
    </header>
    <!-- header end -->



    <!-- register  -->
    <div class="container alert alert-danger login_form">
        <form action="" method="post">
            <h1>Login</h1>


            <?php 
            
                if(isset($msg)){
                    foreach($msg as $msg){
                        echo '<div class="alert alert-success msg">' . $msg . '</div>';
                    }
                }
            
            ?>


            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <label class="my-3" for="email">Email: </label>
                    <input class="form-control" type="email" name="email" id="email">

                    <label class="my-3" for="pass">Password </label>
                    <input class="form-control" type="password" name="pass" id="pass">


                    <input class="btn btn-danger my-5" type="submit" name="submit" value="Login">
                </div>
            </div>
            <div class="col-md-12">
                <p>Are you not member? <a href="./register.php">Register Here!</a></p>
            </div>
        </form>
    </div>
    <!-- register end -->


    <!-- footer -->
    <footer class="bg-dark py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12 py-4">
                    <div class="row">
                        <div class="col-md-3 text-center">
                            <img class="img-fluid" src="./img/logo (1).png" alt="">
                        </div>
                        <div class="col-md-9">
                            <p class="text-white text-center text-md-left">Dhaka Blood Bank (Beta Preview)</p>
                            <p class="text-white text-center text-md-left">Phone: 0466454154747</p>

                            <a class="text-white d-block text-center text-md-left" href="https://www.facebook.com/groups/331521442397944/"><i class="fa-brands fa-facebook"></i> Join Facebook</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 py-4">
                    <p class="text-white text-center text-md-left">&copy; 2022 Mahmood Hassan Rameem</p>

                    <ul class="text-center text-md-left">
                        <li class="px-2"><a class="text-white" href="https://www.facebook.com/mahmood.rameem/"><i class="fa-brands fa-facebook"></i></a></li>
                        <li class="px-2"><a class="text-white" href="https://github.com/rameem2003"><i class="fa-brands fa-github"></i></a></li>
                        <li class="px-2"><a class="text-white" href="https://twitter.com/MHRameem2003"><i class="fa-brands fa-twitter"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer end -->
</body>
</html>