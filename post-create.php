
<?php
    session_start();
    if (empty($_SESSION["auth_user"])) header("location:login-index.html?login-first");
    else{
        $user = $_SESSION["auth_user"];
        $body =$_POST["body"];

        require("db.php");
        $qry ="insert into posts (body, users_id, category) values ('$body', ".$user["id"] .", 'friends')";
        $rslt =mysqli_query($cn , $qry);
        $post_id =mysqli_insert_id($cn);
  
        for($i=0 ; $i< count($_FILES ["images"]["name"] );$i++){
            // $_FILES ["images"]["name"][$i] 
            $file_name ="storage/posts/$i" . date('YmdHis').$_FILES ["images"]["name"][$i];
            move_uploaded_file($_FILES ["images"]["tmp_name"][$i]  ,  $file_name  );

            $qry ="insert into post_images (url,post_id) values ('$file_name' , $post_id)";
            $rslt =mysqli_query($cn , $qry);
        }
        mysqli_close($cn);
    }
    
 header("location:home.php");

  