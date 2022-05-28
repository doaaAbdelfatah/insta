<?php 
    session_start();
    if (empty($_SESSION["auth_user"])) header("location:login-index.html?login-first");
    else{
        $user = $_SESSION["auth_user"];
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> home page</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <!--google fonts style-->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet" />
    <!--fontawsome stlye-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/home_style.css" />

</head>

<body>
    <!--header section start-->
    <section class="header">
        <nav>
            <h3>Instagram</h3>
            <input type="search" placeholder="search" />
            <ul>
                <li>
                    <a href="#"><i class="fas fa-home"></i></a>
                </li>
                <li>
                    <a href="#"><i class="far fa-paper-plane"></i></a>
                </li>
                <li>
                    <a href="#"><i class="far fa-compass"></i></a>
                </li>
                <li>
                    <a href="#"><i class="far fa-heart"></i></a>
                </li>
                <li>
                    <!-- <a href="#"><i class="far fa-user"></i></a> -->
                    <span><?=  $user ["name"]?></span>
                </li>
            </ul>
        </nav>
    </section>




    <!--share section-->



    <div class="  py-5 my-5 col-md-5  mx-auto ">
        <form action="">
            <div class=" mb-3 w-50  border-dark border-1 ">
                <!-- <label class="input-group-text" for="inputGroupFile01"></label> -->
                <input type="text" placeholder="say Somthing" id="inputGroupFile01">
                <i class=" fa fa-image "> <input type="file" multiple id="inputGroupFile01">
                </i>
            </div>
            <button type="submit" class="btn btn-primary">share</button>
        </form>
    </div>
    <!--body bar section start-->
    <div class="body">
        <section class="left ">
            <!--status start-->

            <div class="status    col-md-5 col-lg-6 col-xl-12  mx-auto">
                <div class="image">
                    <img src="images/cars/car1.jpg" alt="image" />
                    <h6>Ali</h6>
                </div>
                <div class="image">
                    <img src="images/cars/car2.jpg" alt="image" />
                    <h6>praveen </h6>
                </div>
                <div class="image">
                    <img src="images/cars/car3.jpg" alt="image" />
                    <h6>deenadhy...</h6>
                </div>
                <div class="image">
                    <img src="images/cars/car4.jpg" alt="image" />
                    <h6>vikin</h6>
                </div>
                <div class="image">
                    <img src="images/cars/car5.png" alt="image" />
                    <h6>siva</h6>
                </div>
                <div class="image">
                    <img src="images/cars/car6.jpg" alt="image" />
                    <h6>Ali Sayeed</h6>
                </div>
                <div class="image">
                    <img src="images/cars/car7.jpg" alt="image" />
                    <h6>praveen k...</h6>
                </div>
                <div class="image">
                    <img src="images/cars/car8.jpg" alt="image" />
                    <h6>deenadhy...</h6>
                </div>
            </div>
            <!--folowed member col-md-5 col-lg-6 col-xl-12  mx-auto col-md-5 col-lg-6 col-xl-12 col-md-5s-->
            <div class="member col-md-5 col-lg-6 col-xl-12  mx-auto col-md-5 col-lg-6 col-xl-12 col-md-5">
                <div class="profile">
                    <img src="images/cars/gtr.jpg" alt="" />
                    <h6>gtr lover</h6>
                    <span>...</span>
                </div>
                <div class="photos col-md-5 mx-auto">
                    <img class="w-100 mx-auto" src="images/cars/car2.jpg" alt="photo" />
                </div>
                <div class="share">
                    <div class="heart">
                        <i class="far fa-heart"></i>
                        <i class="far fa-comment"></i>
                        <i class="far fa-paper-plane"></i>
                    </div>
                    <i class="far fa-bookmark"></i>
                </div>
                <div class="like">
                    <img src="images/cars/car1.jpg" alt="" />
                    <p>liked by Youseif ALi and others</p>
                </div>
                <span>3 DAYS AGO</span>
            </div>
            <div class="member col-md-5 col-lg-6 col-xl-12  mx-auto col-md-5 col-lg-6 col-xl-12 col-md-5">
                <div class="profile">
                    <img src="images/cars/gtr.jpg" alt="" />
                    <h6>gtr lover</h6>
                    <span>...</span>
                </div>
                <div class="photos  col-md-5 mx-auto">
                    <img class="w-100 mx-auto" src="images/cars/road.jpg" alt="photo" />
                </div>
                <div class="share">
                    <div class="heart">
                        <i class="far fa-heart"></i>
                        <i class="far fa-comment"></i>
                        <i class="far fa-paper-plane"></i>
                    </div>
                    <i class="far fa-bookmark"></i>
                </div>
                <div class="like">
                    <img src="images/cars/gtr.jpg" alt="" />
                    <p>liked by Sayed Ali and others</p>
                </div>
                <span>3 DAYS AGO</span>
            </div>
            <div class="member col-md-5 col-lg-6 col-xl-12  mx-auto col-md-5 col-lg-6 col-xl-12 col-md-5">
                <div class="profile">
                    <img src="images/cars/car1.jpg" alt="" />
                    <h6>gtr lover</h6>
                    <span>...</span>
                </div>
                <div class="photos col-md-5 mx-auto">
                    <img class="w-100 mx-auto" src="images/cars/car7.jpg" alt="photo" />
                </div>
                <div class="share">
                    <div class="heart">
                        <i class="far fa-heart"></i>
                        <i class="far fa-comment"></i>
                        <i class="far fa-paper-plane"></i>
                    </div>
                    <i class="far fa-bookmark"></i>
                </div>
                <div class="like">
                    <img src="images/cars/car2.jpg" alt="" />
                    <p>liked by Ahmed and others</p>
                </div>
                <span>3 DAYS AGO</span>
            </div>
            <div class="member col-md-5 col-lg-6 col-xl-12  mx-auto col-md-5 col-lg-6 col-xl-12 col-md-5">
                <div class="profile">
                    <img src="images/cars/car2.jpg" alt="" />
                    <h6>gtr lover</h6>
                    <span>...</span>
                </div>
                <div class="photos col-md-5 mx-auto">
                    <img class="w-100 mx-auto" src="images/cars/car4.jpg" alt="photo" />
                </div>
                <div class="share">
                    <div class="heart">
                        <i class="far fa-heart"></i>
                        <i class="far fa-comment"></i>
                        <i class="far fa-paper-plane"></i>
                    </div>
                    <i class="far fa-bookmark"></i>
                </div>
                <div class="like">
                    <img src="images/cars/car1.jpg" alt="" />
                    <p>liked by ryad and others</p>
                </div>
                <span>3 DAYS AGO</span>
            </div>
            <div class="member col-md-5 col-lg-6 col-xl-12  mx-auto col-md-5 col-lg-6 col-xl-12 col-md-5">
                <div class="profile">
                    <img src="images/cars/car4.jpg" alt="" />
                    <h6>gtr lover</h6>
                    <span>...</span>
                </div>
                <div class="photos col-md-5 mx-auto">
                    <img class="w-100 mx-auto" src="images/cars/car5.png" alt="photo" />
                </div>
                <div class="share">
                    <div class="heart">
                        <i class="far fa-heart"></i>
                        <i class="far fa-comment"></i>
                        <i class="far fa-paper-plane"></i>
                    </div>
                    <i class="far fa-bookmark"></i>
                </div>
                <div class="like">
                    <img src="images/cars/car1.jpg" alt="" />
                    <p>liked by refat elsigab and others</p>
                </div>
                <span>3 DAYS AGO</span>
            </div>
        </section>
    </div>
</body>

</html>