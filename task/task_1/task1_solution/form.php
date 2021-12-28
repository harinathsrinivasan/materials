<?php
        include_once('./db.php');
        include_once('./repo.php');
$fname = $lname = $aadhar = $email = $phoneNo = $address = $pincode = "";
$fname_Err = $lname_Err = $aadhar_Err = $email_Err = $pin_Err = $address_Err = $phoneNo_Err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
}

function check_input($data)
{
    $data = trim($data);
    $data = htmlspecialchars($data);
    return $data;
}


?>

<?php

if (isset($_POST["submit"])) {
    $fname =  check_input($_POST["fname"]);
    $middle_name = $_POST["middlename"];
    $lname =  check_input($_POST["lname"]);
    $aadhar =  check_input($_POST["aadhar"]);
    $email =  check_input($_POST["email"]);
    $phoneNo =  check_input($_POST["phoneNo"]);
    $pincode =  check_input($_POST["pincode"]);
    $address =  check_input($_POST["address"]);
    
    if (empty($fname) or !preg_match("/^[a-zA-Z]*$/", $fname) or (strlen($fname) < 3)) {
        $fname_Err = "<p>First Name field is required.</p>";
    } elseif (empty($lname) or !preg_match("/^[a-zA-Z]*$/", $lname) or (strlen($lname) < 3)) {
        $lname_Err = "<p>second Name field is required.</p>";
    } elseif (empty($aadhar) or (strlen($aadhar) < 9)) {
        $aadhar_Err = "<p>Social Identification No field is required.</p>";
    } elseif (empty($email) or !(preg_match("/^([a-z0-9\+\-]+)(\.[a-z0-9\+\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email))) {
        $email_Err = "<p>email field is required.</p>";
    } elseif (empty($phoneNo) or (strlen($phoneNo) < 10)) {
        $phoneNo_Err = "<p>phone no field is required.</p>";
    } elseif (empty($pincode) or (strlen($pincode) < 6)) {
        $pin_Err = "<p>Pincode field is required.</p>";
    } elseif (empty($address) or !preg_match("/^[a-zA-Z]*$/", $address)) {
        $address_Err = "<p>Address field is required.</p>";
    } else {
        $to_email = $email;
        $subject = " Registered Successfully ";
        $body = "<HTML>
        <Body>
        <h3>Thanks for reaching our team </h3> <br>
        <h1 >IMPORTANT! Do not loose your credentials</h1> <br>
        <p>
         <h3>Dear $fname &nbsp; $lname &nbsp; your have registered  for vaccination with aadhar number &nbsp; $aadhar  </h3><br>
         <p> your login details are username : <b>user</b>  &nbsp;  password : <b>password</b> </p><br>
         <p>Thankyou have a nice day.</p>
         </P>
        
        
        </Body>
        </HTML>";
        $headers = "From: sender email" . "\r\n" . "Content-type: text/html; charset=iso-8859-1</iso-8859-1> " . "\r\n";
        
        if (mail($to_email, $subject, $body, $headers)) {

            createUser($fname, $middle_name, $lname, $aadhar, $email, $phoneNo, $address, $pincode);
            // echo "Email successfully sent to $to_email...";
        }
        header("Location:registeredDone.php");
    }
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
    <h1>Registration Form</h1>
    <form method="POST" action=<?php echo $_SERVER['PHP_SELF'] ?>>
        <div class="row">
            <label class="form-label">
                <h4>First Name</h4>
            </label>
            <input type="text" class="form-control" name="fname">
            <span class="error"><?php echo $fname_Err; ?></span>
        </div>
        <div class="row">
            <label class="form-label">
                <h4>Middle Name</h4>
            </label>
            <input type="text" class="form-control" name="middlename">
        </div>
        <div class="row">
            <label class="form-label">
                <h4>Last Name</h4>
            </label>
            <input type="text" class="form-control" name="lname">
            <span class="error"><?php echo $lname_Err; ?></span>
        </div>
        <div class="row">
            <label class="form-label">
                <h4>Social Identification No</h4>
            </label>
            <input type="text" class="form-control" name="aadhar">
            <span class="error"><?php echo $aadhar_Err; ?></span>
        </div>
        <div class="row">
            <label class="form-label">
                <h4>Email</h4>
            </label>
            <input type="text" class="form-control" name="email">
            <span class="error"><?php echo $email_Err; ?></span>
        </div>
        <div class="row">
            <label class="form-label">
                <h4>Phone NO</h4>
            </label>
            <input type="text" class="form-control" name="phoneNo">
            <span class="error"><?php echo $phoneNo_Err; ?></span>
        </div>
        <div class="row">
            <label class="form-label">
                <h4>Address</h4>
            </label>
            <input type="text" class="form-control" name="address">
            <span class="error"><?php echo $address_Err; ?></span>
        </div>
        <div class="row">
            <label class="form-label">
                <h4>Pin Code</h4>
            </label>
            <input type="text" class="form-control" name="pincode">
            <span class="error"><?php echo $pin_Err; ?></span>
        </div>
        <button name="submit" type="submit">Login</button>
    </form>
</body>

</html>