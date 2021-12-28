<?php

    session_start();

    if (isset($_SESSION["username"])) {

        unset($_SESSION["username"]);
    ?>

     <script>
         setTimeout(
             function() {
                 window.location = "http://localhost/assiment/login.php";
             }, 200);
     </script>

 <?php
    }

    ?>

 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

     <title>logout</title>
 </head>

 <body style="background-color:#f6f5f5;">

     <div style="box-shadow:1px 1px 2px 1px;background-color:#fff;  width:30%; height:230px; margin:auto; position:absolute;top:10%;left:35%;">

         <h4 style="text-align: center; color:red; position:absolute;top:30%;left:20%;">LOGOUT SUCCESSFULLY...</h4>
         <br>
     </div>

 </body>

 </html>