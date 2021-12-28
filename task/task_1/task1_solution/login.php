<?php
session_start();

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $userPassword = $_POST['userPassword'];
    $_SESSION['username'] = $username;
    $login = false;

    $user_info = array(
        "user" => "password",
        "employee" => "password",
    );

    foreach ($user_info as $key => $value) {

        $login = ($key === $username && $value === $userPassword) ? true : false;
        if ($login) break;
    }

    if ($login) {
        if ($_SESSION['username'] == "user"){
            header("Location: http://localhost/assiment/vcenter.php");
            // echo "<h4>You have successfully logged in</h4>";
        }
        elseif($_SESSION['username'] == "employee"){
            header("Location: http://localhost/assiment/data.php");
        }
        } else {
        echo "<h4>Sorry wrong information has been entered</h4>" . "<br>";
    }
}

$username = $userPassword = '';
$userName_Err = $UserPassword_Err = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username =  check_input($_POST["username"]);
    if (empty($username) or !preg_match("/^[a-zA-Z]*$/", $username) or (strlen($username) < 3)) {
        $userName_Err = "<p>User Name field is required.</p>";
    }

    $userPassword =  check_input($_POST["userPassword"]);
    if (empty($userPassword) or !preg_match("/^[a-zA-Z0-9]*$/", $userPassword) or (strlen($userPassword) < 3)) {
        $UserPassword_Err = "<p>password field is required.</p>";
    }
}

function check_input($data)
{
    $data = trim($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');

        body {
            font-family: 'Open Sans', sans-serif;
            background: #f9faff;
            color: #3a3c47;
            line-height: 1.6;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 0;
            padding: 0;
        }

        .error {
            color: red;
        }

        h1 {
            margin-top: 50px;
        }

        form {
            background: #fff;
            max-width: 480px;
            width: 100%;
            padding: 55px 55px;
            border: 1px solid #e1e2f0;
            border-radius: 4px;
            box-shadow: 0 0 5px 0 rgba(42, 45, 48, 0.12);
            transition: all 0.3s ease;
        }

        .row {
            display: flex;
            flex-direction: column;
            margin-bottom: 20px;
        }

        .row label {
            font-size: 13px;
            color: #8086a9;
        }

        .row input {
            flex: 1;
            padding: 13px;
            border: 1px solid #d6d8e6;
            border-radius: 4px;
            font-size: 16px;
            transition: all 0.2s ease-out;
        }

        .row input:focus {
            outline: none;
            box-shadow: inset 2px 2px 5px 0 rgba(42, 45, 48, 0.12);
        }

        button {
            width: 100%;
            padding: 12px;
            font-size: 18px;
            background: dodgerblue;
            color: #fff;
            border: none;
            border-radius: 100px;
            cursor: pointer;
            font-family: 'Open Sans', sans-serif;
            margin-top: 15px;
            transition: background 0.2s ease-out;
        }

        @media(max-width: 458px) {

            body {
                margin: 0 18px;
            }

            form {
                background: #f9faff;
                border: none;
                box-shadow: none;
                padding: 20px 0;
            }

        }
    </style>
</head>

<body>
    <h1>Login</h1>
    <form method="POST" action=<?php echo $_SERVER['PHP_SELF'] ?>>
        <div class="row">
            <label class="form-label">
                <h4>User Name</h4>
            </label>
            <input type="text" class="form-control" name="username">
            <span class="error"><?php echo $userName_Err; ?></span>
        </div>
        <div class="row">
            <label class="form-label">
                <h4>Password</h4>
            </label>
            <input type="password" class="form-control" name="userPassword">
            <span class="error"><?php echo $UserPassword_Err; ?></span>
        </div>
        <button name="submit" type="submit">Login</button> <br> <br>
        <h4>Not Yet Registered ? <a href="form.php">Register now</a></h4>
    </form>
</body>

</html>