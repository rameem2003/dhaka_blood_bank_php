<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Donors</title>
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

                <a class="navbar-brand d-flex" href="../index.html">
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
                    <li class="nav-item px-2"><a class="nav-link text-white" target="_blank" href="./register.php">Join as Donor</a></li>
                  </ul>
                </div>
            </nav>
        </div>
    </header>
    <!-- header end -->



    <!-- list -->
    <section id="members">
        <div class="container">
            <section class="list">
                <div class="row">
                    <div class="col-md-12 py-4">
                        <h1 class="title text-center">Our Member's</h1>
                    </div>
                </div>
                <div class="row text-center" id="members">


                    <?php 
                    
                        include './include/config.php';

                        $load_card_query = "SELECT * FROM `members`";
                        $run_query = mysqli_query($conn, $load_card_query);

                        if(mysqli_num_rows($run_query) > 0){
                            while($row = mysqli_fetch_assoc($run_query)){

                                
                                ?>
                                    <div class="col-md-4 col-sm-12">
                                        <div class="profile p-3 bg-danger my-3">
                                            <div class="pro-img">
                                                <img class="img-fluid" src="https://www.pavilionweb.com/wp-content/uploads/2017/03/man-300x300.png" alt="">
                                            </div>
                                            <div class="pro-des">
                                                <h2 class="text-center text-white name"><?php echo $row["name"]; ?></h2>
                                                <p class="text-center text-white blood">Blood group: <?php echo $row["blood"]; ?></p>
                                                <p class="text-center text-white card-info">Last Donate: <?php echo $row["date"]; ?></p>
                                                <p class="text-center text-white card-info">Location: <?php echo $row["location"]; ?></p>
                                                <p class="text-center text-white card-info">Email: <?php echo $row["email"]; ?></p>
                                                <a class="btn btn-success text-center d-block coustom_btn ml-auto" href="tel:+88<?php echo $row["phone"]; ?>"><i class="fa-solid fa-phone"></i> Call</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php


                            }
                        }else{
                            echo `<script> alert("No data found") </script>`;
                        }

                    
                    ?>


                </div>
            </section>
        </div>
    </section>
    
    <!-- list end -->




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



    <!-- bootstrap js -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>