<?php 

include "config.php"; 

if (!empty($_POST['user_name'])){ 
    $user_name = $_POST['user_name']; 
    $user_email = $_POST['user_email']; 
    $login_name = $_POST['login_name'];
    $login_password = $_POST['login_password'];
    $biography = $_POST['biography'];
    $age = $_POST['age'];
    $sql_statement = "INSERT INTO users(user_name, user_email) VALUES ('$user_name','$user_email')"; 
    $result = mysqli_query($db, $sql_statement);
   
    
    $user_id = $db->insert_id;
    $sql_statement2 = "INSERT INTO Login(user_id, login_name, login_password) VALUES ('$user_id','$login_name','$login_password')"; 
    $result2 = mysqli_query($db, $sql_statement2);

    $sql_statement3 = "INSERT INTO account(user_id, biography, age) VALUES ('$user_id', '$biography', '$age')";
    $result3 = mysqli_query($db, $sql_statement3);
    

} 
else 
{
    echo "You did not enter your name.";
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>User Insertion Form</title>
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
            td {
            font-weight: bold;
            }

        </style>
    </head>
    <body>
        <header class="header">
            <ul class="navbar">
                <a href="./user_insertion.html" class="active">New User</a>
                <a href="./homepage.php">Home Page</a>
                <a href="./delete_user.html">Delete User</a>
                <a href="./user_select.html">Search User</a>
                <a href="http://localhost:3000/create">Support</a>
                <a href="./friend.php">Add Friends</a>
            </ul>
        </header>
        <div class="center">
            <h1>Account</h1>
            <form action="insertuser.php" method="post" style="height: 13rem">
                <div class="txt_field">
                    <?php
                        echo $user_name;
                    ?>
                    <span></span>
                </div>
                <div class="txt_field">
                    <?php
                        echo $biography;
                    ?>
                    <span></span>
                </div>
                
                <div class="txt_field">
                    <?php
                        echo $age
                    ?>
                    <span></span>
                </div>

            </form>
        </div>
    </body>


</html>