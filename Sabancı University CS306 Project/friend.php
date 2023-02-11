<?php 

include "config.php"; 
  

   
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Add Friends</title>
        <link rel="stylesheet" href="style.css">

        <style>
            .header{
                position: fixed;
                width: 100%;
                top: 0;
                right: 0;
                z-index: 1000;
                display: flex;
                align-items: center;
                justify-content: space-between;
                background: transparent;
                padding: 28px 12%;
                transition: all .50s ease;
                text-decoration-style: none;
            }
            .navbar{
                margin: 0 auto;
                display: flex;
            }
            .navbar a{
                color: #c2dff3;
                font-size: 1.4rem;
                font-weight: 500;
                padding: 5px 0;
                margin: 0px 30px;
                transition: all .50s ease;
                text-decoration: none;

            }
            .navbar a:hover{
                color: #f359d1;

            }
            .navbar a.active{
                color: #f359d1;
            }

        </style>

    </head>
    <body>
        <header class="header">
            <ul class="navbar">
                <a href="./user_insertion.html">New User</a>
                <a href="./homepage.php">Home Page</a>
                <a href="./delete_user.html">Delete User</a>
                <a href="./user_select.html" >Search User</a>
                <a href="http://localhost:3000/create">Support</a>
                <a href="./friend.php" class="active">Add Friends</a>
            </ul>
        </header>
        <div class="center">
            <h1>Add Friends</h1>
            <form action="friend.php" method="post" style="height: 10rem">
            <div class="txt_field">                
                <select class="friend_id" name="friend_id">
                <?php 

                    $sql_statement = "SELECT user_name, user_id FROM users"; 
                  $result = mysqli_query($db, $sql_statement);
                     while($row = mysqli_fetch_assoc($result)) {
                        $user_name = $row['user_name'];
                        $user_id = $row['user_id'];
                        echo"<option value= $user_id>". $user_name . " ". "</option>"; // Print a single column data
                      
                    }            

                  ?>
                  </select>
                    <span></span>
                </div>
                <div class="txt_field">
                  <?php 

            if (!empty($_POST['friend_id'])){ 
                $sql_statement2 = "INSERT INTO friends(friend_id, user_id) VALUES ($user_id, 17)"; 
                $result2 = mysqli_query($db, $sql_statement2);   
            }
                  ?>
                    <span></span>
                </div>
                
                <input type="submit" value="Add Friend"> 
            </form>
        </div>
    </body>


</html>