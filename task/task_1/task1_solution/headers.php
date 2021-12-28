<?php
session_start();
if (isset($_SESSION['username'])) {
    //  echo $_SESSION['userName'];
} else {
    header('Location: http://localhost/assiment/login.php');
    header("Requested_URL: {$_SERVER['REQUEST_URI']}");
    // echo $_SESSION['userName'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        html,
        body,
        div,
        p,
        ul,
        li {
            margin: 0;
            padding: 0;
            border: 0;
            font-size: 100%;
            font: inherit;
            vertical-align: baseline;
            font-family: 'Roboto', sans-serif;
            font-weight: 100;
        }

        .nav {
            background: royalblue;
            height: 60px;
        }

        .nav li {
            display: inline-block;
            list-style: none;
            height: 60px;
            line-height: 60px;
            padding: 0 40px;
        }

        .nav li:hover {
            background: rgb(51, 51, 255);
        }

        .nav-link {
            color: #ffffff;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="nav">
        <ul>
            <?php if ($_SESSION['username'] == "employee") { ?>
                <li><a href="data.php" class="nav-link">Dashboard</a></li>
            <?php } ?>
            <li><a href="vcenter.php" class="nav-link">View Centers</a></li>
            <li><a href="contactus.php" class="nav-link">Contact Us</a></li>
            <li><a href="form.php" class="nav-link">Add Member</a></li>
            <li style="float: right;">
                <a class="btn btn-light" href="logout.php" role="button" name='submitbtn' style="float:right; font-size: x-large; color:white">
                    <i class="fa fa-sign-out fa-fw "></i></a>
            </li>
        </ul>
    </div>
</body>

</html>