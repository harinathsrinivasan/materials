<?php include_once('./headers.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        div.elem-group {
            margin: 40px 0;
        }

        label {
            display: block;
            font-family: 'Aleo';
            font-size: 1.25em;
        }

        input,
        select,
        textarea {
            border-radius: 2px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            font-size: 1.25em;
            font-family: 'Aleo';
            width: 500px;
        }

        button {
            height: 50px;
            background: green;
            color: white;
            border: 2px solid darkgreen;
            font-size: 1.25em;
            font-family: 'Aleo';
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            border: 2px solid black;
        }
    </style>
</head>

<body>
    <form method="post" style="text-align:center">
        <div class="elem-group">
            <input type="text" id="name" name="visitor_name" placeholder="Name" pattern=[A-Z\sa-z]{3,20} required>
        </div>
        <div class="elem-group">
            <input type="email" id="email" name="visitor_email" placeholder="xyz@email.com" required>
        </div>
        <div class="elem-group">
            <input type="text" id="text" name="visitor_email" placeholder="Subject" required>
        </div>
        <div class="elem-group">
            <textarea id="message" name="visitor_message" placeholder="Reason For Contacting Us." rows="2" cols="50" required></textarea>
        </div>
        <button type="submit">Send Message</button>
    </form>
</body>

</html>