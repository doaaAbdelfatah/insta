<pre>
<?php 
    // var_dump($_POST);
    
    //validate and filter
    $name       = trim($_POST["name"]);
    $user_name  = $_POST["user_name"];
    $email      = $_POST["email"];
    $password   = md5($_POST["password"]);
    $mobile     = $_POST["mobile"];
    $gender     = $_POST["gender"];
    $birthdate  = $_POST["birthdate"];

    $qry= "insert into users (name, user_name, email, password, mobile, birthdate, gender) 
    values('$name', '$user_name', '$email', '$password', '$mobile', '$birthdate', '$gender')";


    require("db.php");
    $rslt =mysqli_query($cn , $qry);
    // echo mysqli_error($cn);
    if ( mysqli_errno($cn) == 0){
        header("location:login-index.html");
    }else{
        //session errors
        header("location:index.html?error=" . mysqli_error($cn));

    }
    mysqli_close($cn);
   

