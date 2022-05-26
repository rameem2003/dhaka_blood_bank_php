<?php 


    include "./include/config.php";

    session_start();
    $user_id = $_SESSION['user_id'];

    if(!isset($user_id)){
        header("location:login.php");
    }

    if(isset($_GET['logout'])){
        unset($user_id);
        session_destroy();
        header("location:login.php");
    }

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
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
                    <li class="nav-item px-2"><a class="nav-link text-white" href="./index.php">Home</a></li>
                    <li class="nav-item px-2"><a class="nav-link text-white" href="./index.php#about">About Us</a></li>
                    <li class="nav-item px-2"><a class="nav-link text-white" href="./index.php#members">Our Donor</a></li>
                    <li class="nav-item px-2"><a class="nav-link text-white" target="_blank" href="./register.php">Join as Donor</a></li>
                  </ul>
                </div>
            </nav>
        </div>
    </header>
    <!-- header end -->



    <!-- register  -->
    <div class="container alert alert-danger login_form">
        <form action="" method="post">
            <h1>Profile</h1>
            
            <div class="row">
                <div class="col-md-4 col-sm-12 d-flex justify-content-center align-items-center">
                    <img class="img-fluid" src="https://www.pavilionweb.com/wp-content/uploads/2017/03/man-300x300.png" alt="">
                </div>

                <div class="col-md-8 col-sm-12">
                    <?php 
                        $load_profile = "SELECT * FROM `members` WHERE id = '$user_id'";

                        $run_query = mysqli_query($conn, $load_profile);

                        if(mysqli_num_rows($run_query) > 0){
                            $row = mysqli_fetch_assoc($run_query);
                        }

                    ?>


                    <h2 class="mb-4">Your name: <?php echo $row["name"] ?> </h2>
                    <h2 class="mb-4">User ID: <?php echo $row["user_id"] ?> </h2>
                    <h2 class="mb-4">Blood Group: <?php echo $row["blood"] ?> </h2>
                    <h2 class="mb-4">Phone: <?php echo $row["phone"] ?> </h2>
                    <h2 class="mb-4">Email: <?php echo $row["email"] ?> </h2>
                    <h2 class="mb-4">Last Donet Date: <?php echo $row["date"] ?> </h2>
                    <h2 class="mb-4">Location: <?php echo $row["location"] ?> </h2>


                    <a class="btn btn-danger" href="profile.php?logout=<?php echo $user_id; ?> ">Logout</a>
                    <a class="btn btn-warning" href="./edit.php">Edit</a>
                </div>
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