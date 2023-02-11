<?php

include "config.php";

if(!empty($_POST['user_name']))
{
    $user_name = $_POST['user_name'];

    $sql_statement2 = "DELETE FROM login WHERE user_id = ANY( SELECT user_id FROM users WHERE user_name='$user_name')";
    $result2 = mysqli_query($db, $sql_statement2);
    

    $sql_statement = "DELETE FROM users WHERE user_name = '$user_name'";
    $result = mysqli_query($db, $sql_statement);
    
}

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>User Deletion Form</title>
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
                <a href="./delete_user.html" class="active">Delete User</a>
                <a href="./user_select.html">Search User</a>
                <a href="http://localhost:3000/create">Support</a>
                <a href="./friend.php">Add Friends</a>
            </ul>
        </header>
        <div class="center">
            <h1>User Deleted</Form></h1>
            <form action="delete_user.php" method="post" style="height: 10rem">
                <div class="txt_field">
                    <?php
                        echo $user_name;
                    ?>
                    <span></span>
                    
                </div>
            </form>
        </div>
    </body>


</html>