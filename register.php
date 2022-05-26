<?php 


    include "./include/config.php";

    if(isset($_POST["submit"])){
        $name = $_POST["name"];
        $uid = $_POST["uid"];
        $pass = $_POST["pass"];
        $cpass = $_POST["cpass"];
        $blood = $_POST["blood"];
        $phone = $_POST["phone"];
        $email = $_POST["email"];
        $date = $_POST["date"];
        $location = $_POST["loc"];


        $insert_query = "INSERT INTO `members` (name, user_id, pass, blood, phone, email, date, location) VALUES('$name', '$uid', '$pass', '$blood', '$phone', '$email', '$date', '$location')";


        if($pass != $cpass){
            $msg[] = "Password not matching!!!";
        }else{
            mysqli_query($conn, $insert_query);
            $msg[] = "Registration Succesfull";
        }
    }

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
    <div class="container alert alert-danger form">
        <form action="" method="post">
            <h1>Register</h1>


            <?php 
            
                if(isset($msg)){
                    foreach($msg as $msg){
                        echo '<div class="alert alert-success msg">' . $msg . '</div>';
                    }
                }
            
            ?>


            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <label class="my-3" for="name">Your Name: </label>
                    <input class="form-control" type="text" name="name" id="name">

                    <label class="my-3" for="pass">Create password </label>
                    <input class="form-control" type="password" name="pass" id="pass">


                    <label class="my-3" for="blood">Blood Group:</label>
                    <select class="form-control" name="blood" id="blood">
                        <option value="" selected>---Select Blood Group---</option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                    </select>


                    <label class="my-3" for="email">Email:</label>
                    <input class="form-control" type="email" name="email" id="email">


                    <label class="my-3" for="loc">Location:</label>
                    <input class="form-control" type="text" name="loc" id="loc">


                    <input class="btn btn-success my-5" type="submit" name="submit" value="Register">
                    <input class="btn btn-danger my-5" type="reset" name="" value="Reset">
                </div>

                <div class="col-md-6 col-sm-12">
                    <label class="my-3" for="uid">Create User ID:</label>
                    <input class="form-control" type="text" name="uid" id="uid">


                    <label class="my-3" for="cpass">Confirm password </label>
                    <input class="form-control" type="password" name="cpass" id="cpass">
                    <p class="text-danger" id="validate"></p>


                    <label class="my-3" for="phone">Phone Number: </label>
                    <input class="form-control" type="number" name="phone" id="phone">


                    <label class="my-3" for="date">Last Donet Date:</label>
                    <input class="form-control" type="date" name="date" id="date">
                </div>
            </div>

            <div class="col-md-12">
                <p>Are you member? <a href="./login.php">Login Here!</a></p>
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

    <script>
        
        const cpass = document.getElementById("cpass");
        
        cpass.addEventListener("keyup", () => {
            const pass = document.getElementById("pass").value;
            const validate = document.getElementById("validate");
            // confirm_pass = cpass.value;

            if(pass != cpass.value){
                validate.style.display = "block";
                validate.innerHTML = "Password not matched!!";
            }else{
                validate.innerHTML = "";
                validate.style.display = "none";
            }


            console.log(pass, cpass.value);
        })
        
    </script>
</body>
</html>