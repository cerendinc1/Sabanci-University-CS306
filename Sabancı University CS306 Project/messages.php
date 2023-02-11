<?php 

include "config.php"; 
  

   
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Chat</title>
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
                <a href="./friend.php">Add Friends</a>
            </ul>
        </header>
        <div class="center">
            <h1>Chat</h1>
            <form action="messages.php" method="post" style="height: 20rem">
            <div class="txt_field">                
                <input type="text" id="message_text" name="message_text">
                <?php 
                if (!empty($_POST['message_text'])){ 

                    $message_text = $_POST['message_text']; 
                    $sql_statement = "INSERT INTO messages(friend_id, user_id, message_text) VALUES (11, 10,'$message_text')"; 
                    $result = mysqli_query($db, $sql_statement);
                    $message_text = ''; 
                }

                  ?>
                    <span></span>
                </div>
                <div class="txt_field">
                  <?php 

            $sql_statement2 = "SELECT message_text FROM messages WHERE 1"; 
            $result2 = mysqli_query($db, $sql_statement2);
                     while($row = mysqli_fetch_array($result2)) {
                        echo $row['message_text']; // Print a single column data
                       echo nl2br("\n");
                    }
                  ?>
                    <span></span>
                </div>
                
                <input type="submit" value="Send"> 
            </form>
        </div>
    </body>


</html>