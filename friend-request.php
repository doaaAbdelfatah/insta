
<?php
    session_start();
    if (empty($_SESSION["auth_user"])) header("location:login-index.html?login-first");
    else{
        
        $user = $_SESSION["auth_user"];
        $friend_id =$_GET["friend_id"];
        require("db.php");
        // status=remove
        if (!empty($_GET["status"]) ){

            switch($_GET["status"]) {
                case "remove" :
                    $qry ="delete from friendes where friend_id =$friend_id and users_id=" .$user["id"];
                    break;
                case "accept" :
                    $qry ="update  friendes set request_status='accepted'  where users_id =$friend_id and friend_id=" .$user["id"];
                    break;
                case "reject" :
                    $qry ="update  friendes set request_status='rejected'  where users_id =$friend_id and friend_id=" .$user["id"];
                    break;
                    

            }

        }else{
            $qry ="insert into friendes(users_id, friend_id) values (". $user["id"] ." , $friend_id)";
        }       
        $rslt =mysqli_query($cn , $qry);
          echo mysqli_error($cn);
        mysqli_close($cn);
    }
    
 header("location:home.php");

  