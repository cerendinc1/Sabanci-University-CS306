<?php 

include "config.php"; 
  

function get_post_details()
    {
        $db = mysqli_connect('localhost','root','','TEST1');

        $ret = array();
        $sql = "SELECT * FROM post";
        $res = mysqli_query($db, $sql);

        while($ar = mysqli_fetch_assoc($res))
        {
            $ret[] = $ar;
        }
        return $ret;
    }
   
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
                <a href="./homepage.php" class="active">Home Page</a>
                <a href="./delete_user.html">Delete User</a>
                <a href="./user_select.html" >Search User</a>
                <a href="http://localhost:3000/create">Support</a>
                <a href="./friend.php">Add Friends</a>
                
                
            </ul>
        </header>
        <div class="center">
            <h1>Post Your Opinions!</h1>
            <form action="homepage.php" method="post" style="height: 30rem">
            <div class="txt_field">                
                <input type="text" id="post_text" name="post_text">
                <?php 
                if (!empty($_POST['post_text'])){ 
                    
                    $post_text = $_POST['post_text']; 
                    $sql_statement = "INSERT INTO post( user_id, post_text, post_date) VALUES ( 35,'$post_text', 'GETDATE()')"; 
                    $result = mysqli_query($db, $sql_statement);
                    $post_text = '';                 
                }

                  ?>
                    <span></span>
                </div>
                <div class="txt_field">

                <table cellspacing="0" cellpadding="10">
                <tr>
                  <th>Posts</th>

                </tr>
              <?php


                $sql_statement2 = "SELECT * FROM post";     
                 $result2 = mysqli_query($db, $sql_statement2);
              if ($result2->num_rows > 0) {
                $sn=1;
                
                while($data = $result2->fetch_array()) {

                 
                   
               ?>
               <tr>
                 <td><?php echo $data['user_id'] . "  " ; ?> </td>
                 <td><?php echo $data['post_text']; ?> </td>
               <tr>
               <?php
                $sn++;}} else { ?>
                  <tr>
                   <td colspan="8">No data found</td>
                  </tr>
               <?php } ?>
                </table>
                  
                    <span></span>
                </div>
                
                <input type="submit" value="Post"> 
            </form>
        </div>
    </body>


</html>