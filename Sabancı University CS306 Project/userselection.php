<?php 

include "config.php"; 

if (!empty($_POST['user_name'])){ 



    $user_name = $_POST['user_name']; 

    $sql_statement = "SELECT * FROM users WHERE user_name LIKE '$user_name%'"; 
    $result = mysqli_query($db, $sql_statement);
    


    $result = mysqli_query($db, $sql_statement);
} 
else 
{
    echo "User Name cannot be null!";
}

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>User Selection Form</title>
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
                <a href="./user_select.html" class="active">Search User</a>
                <a href="http://localhost:3000/create">Support</a>
                <a href="./friend.php">Add Friends</a>
            </ul>
        </header>
        <div class="center">
            <h1>Search Result</h1>
            <form action="userselection.php" method="post" style="height: 10rem">
                <div class="txt_field">
                  <?php 
                    while($row = mysqli_fetch_array($result)) {
                      echo $row['user_name']; // Print a single column data
                      echo nl2br("\n");
       
                    }
                  ?>
                    <span></span>
                    
                </div>
            </form>
        </div>
    </body>


</html>