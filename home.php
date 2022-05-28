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
                    <!-- <a href="#"><i class="far fa-user"></i></a> -->
                    <span><?=  $user ["name"]?></span>
                </li>
                <li>
                    <a href="logout.php" class="text-info"> Logout</a>
                </li>
               
            </ul>
        </nav>
    </section>

    <!--share section-->
    <div class="  py-5 my-5 col-md-5  mx-auto ">
        <form method="post" action="post-create.php"  enctype="multipart/form-data">
            <div class=" mb-3 w-50  border-dark border-1 ">
                <!-- <label class="input-group-text" for="inputGroupFile01"></label> -->
                <textarea type="text" rows="" name="body" placeholder="say Somthing" id="inputGroupFile01"></textarea>
                <i class=" fa fa-image "> <input type="file" name="images[]"  multiple id="inputGroupFile01">
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
             

            <?php 
                require("db.php");                
                $qry ="select u.id ,u.name , u.gender ,u.created_at   ,
                (select request_status from friendes where users_id =".$user["id"]." and friend_id = u.id) request_status ,
                 (select request_status from friendes where friend_id =".$user["id"]." and users_id = u.id) has_request 
                from users u where u.id !=" .$user["id"] . " and u.id not in 
                (select friend_id from friendes where request_status='accepted' and users_id=".$user["id"]."  
                union select users_id from friendes where request_status='accepted' and friend_id=".$user["id"].")"; 

                $rslt =mysqli_query($cn , $qry);
                while($selected_user =mysqli_fetch_assoc($rslt)){
            ?>
                <div class="image">
                    <img src="images/<?= $selected_user["gender"] ?>.png" alt="image" />
                    <h6><?= $selected_user["name"] ?></h6>
                    <?php 
                    if ( !empty($selected_user["has_request"])){
                        ?>
                        <a href="friend-request.php?status=accept&friend_id=<?= $selected_user["id"] ?>" class="h6">Accept</a>| 
                        <a href="friend-request.php?status=reject&friend_id=<?= $selected_user["id"] ?>" class="h6">Reject</a>
                    <?php

                    }elseif ( empty($selected_user["request_status"])){
                        ?>
                            <a href="friend-request.php?friend_id=<?= $selected_user["id"] ?>" class="h6">Freind Request</a>
                        <?php
                    }else{
                        ?>
                        <a href="friend-request.php?status=remove&friend_id=<?= $selected_user["id"] ?>" class="h6">Remove Request</a>
                    <?php  
                    }
                    ?>
                </div>
            <?php
            }
                mysqli_close($cn);
        ?>
            </div>

    <?php
    require("db.php");
    $query ="select p.id , p.body , u.id  user_id,  u.name  ,p.created_at    ,get_first_image(p.id ) url from posts p join users u on (p.users_id =u.id)  order by p.created_at desc";
    $rslt =mysqli_query($cn , $query);
    while($posts =mysqli_fetch_assoc($rslt)){
    ?>
            <!-- start  post section -->
                <div class="member col-md-5 col-lg-6 col-xl-12  mx-auto col-md-5 col-lg-6 col-xl-12 col-md-5">
                    <div class="profile">
                        <img src="images/cars/gtr.jpg" alt="" />
                        <h6><?= $posts["name"]?></h6>
                    </div>
                    <div class="photos col-md-5 mx-auto">
                        <img class="w-100 mx-auto" src="<?= $posts["url"]?>" alt="photo" />
                    </div>
                    <h3> <?= $posts["body"]?></h3>
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
                    <span><?= $posts["created_at"]?></span>
                </div>
            <!-- end  post section -->
   <?php
       }
        mysqli_close($cn);
   ?>
        </section>
    </div>
</body>

</html>