<?php 

session_start();
//filter and valdation
$user_name  =$_POST["username"];
$pw  = md5($_POST["password"]);

$qry = "select name, email, user_name, birthdate, mobile, gender, created_at, update_at from  users  where user_name='$user_name' and password='$pw'";
    
    require("db.php");

    $rslt =mysqli_query($cn , $qry);
    
    if($arr = mysqli_fetch_assoc($rslt)){
        $_SESSION["auth_user"] = $arr;
        header("location:home.php" );

    }else{
            header("location:login-index.html?error=Invalid User Name or Password" );

    }
   
    // // echo mysqli_error($cn);
    // if ( mysqli_errno($cn) == 0){
    //     header("location:login-index.html");
    // }else{
    //     //session errors
    //     header("location:index.html?error=" . mysqli_error($cn));

    // }
    mysqli_close($cn);

