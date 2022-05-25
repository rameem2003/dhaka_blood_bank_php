<?php 

    include './include/config.php';

    session_start();
    $user_id = $_SESSION["user_id"];

    if(isset($_GET['logout'])){
        unset($user_id);
        session_destroy();
        header("location:login.php");
    }


    if(isset($_POST['submit'])){
        $update_name = $_POST["update_name"];
        $update_blood = $_POST["update_blood"];
        $update_phone = $_POST["update_phone"];
        $update_email = $_POST["update_email"];
        $update_date = $_POST["update_date"];
        $update_location = $_POST["update_location"];


        $new_pass = $_POST["new_pass"];
        $c_new_pass = $_POST["c_new_pass"];



        $old_pass = $_POST["old_pass"];
        $input_old_pass = $_POST["input_old_pass"];

        if($old_pass != $input_old_pass){
            $msg[] = "Old password not matched";
        }
        elseif($new_pass != $c_new_pass){
            $msg[] = "Confirm password not matched";
        }
        else{
            $query = "UPDATE `members` SET name = '$update_name', pass = '$new_pass', blood = '$update_blood', phone = '$update_phone', email = '$update_email', date = '$update_date', location = '$update_location' WHERE id = '$user_id'";
            
            mysqli_query($conn, $query);
            $msg[] = "Update Successfull!";
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit profile</title>
    <link rel="shortcut icon" href="./img/logo (1).png" type="image/x-icon">

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


    <!-- edit -->
    <div class="container alert alert-danger login_form">
        <form action="" method="post">
            <h1>Profile</h1>
            
            <div class="row">
                <div class="col-md-4 col-sm-12 d-flex justify-content-center align-items-center">
                    <img class="img-fluid" src="https://www.pavilionweb.com/wp-content/uploads/2017/03/man-300x300.png" alt="">
                </div>

                <div class="col-md-8 col-sm-12">
                    <form action="" method="post">
                        <?php 
                            $load_profile = "SELECT * FROM `members` WHERE id = '$user_id'";

                            $run_query = mysqli_query($conn, $load_profile);

                            if(mysqli_num_rows($run_query) > 0){
                                $row = mysqli_fetch_assoc($run_query);
                            }

                        ?>

                        <?php 
                                
                            if(isset($msg)){
                                foreach($msg as $msg){
                                    echo '<div class="alert alert-success msg">' . $msg . '</div>';
                                }
                            }
                            
                        ?>
                        <div class="row">
                            <div class="col-md-6 col-am-12">
                                <label for="name">Your name: </label>
                                <input class="form-control mb-3" type="text" name="update_name" id="name" value="<?php echo $row['name']; ?>">


                                <label for="blood">Blood group: </label>
                                <input class="form-control mb-3" type="text" name="update_blood" id="blood" value="<?php echo $row['blood']; ?>">


                                <label for="phone">Your phone: </label>
                                <input class="form-control mb-3" type="number" name="update_phone" id="phone" value="<?php echo $row['phone']; ?>">

                                <input type="hidden" name="old_pass" id="" value="<?php echo $row['pass']; ?>">


                                <label for="old_pass">Old password: </label>
                                <input class="form-control mb-3" type="text" name="input_old_pass" id="old_pass">


                                <label for="c_new_pass">Confirm New password: </label>
                                <input class="form-control mb-3" type="text" name="c_new_pass" id="c_new_pass">

                            </div>

                            <div class="col-md-6 col-am-12">

                                <label for="email">Your email: </label>
                                <input class="form-control mb-3" type="email" name="update_email" id="email" value="<?php echo $row['email']; ?>">


                                <label for="date">Last donet date: </label>
                                <input class="form-control mb-3" type="date" name="update_date" id="date" value="<?php echo $row['date']; ?>">


                                <label for="location">Your location: </label>
                                <input class="form-control mb-3" type="text" name="update_location" id="location" value="<?php echo $row['location']; ?>">


                                <label for="new_pass">New password: </label>
                                <input class="form-control mb-3" type="text" name="new_pass" id="new_pass">

                            </div>
                        </div>


                        <input class="btn btn-primary" type="submit" name="submit" value="Update">
                        <a class="btn btn-danger" href="profile.php?logout=<?php echo $user_id; ?>">Logout</a>
                    </form>
                </div>
            </div>
        </form>
    </div>
    <!-- edit end -->


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