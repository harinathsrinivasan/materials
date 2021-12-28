<?php include_once('./headers.php'); ?>

<?php
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

    <!-- Latest compiled and minified CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .tb_search {
            width: 20%;
            float: right;
            padding-bottom: 1.5em;
        }

        input[type=text] {
            float: right;
            padding: 6px;
            margin-top: 8px;
            margin-right: 16px;
            font-size: 17px;
        }
    </style>

    <script>
        function FilterkeyWord_all_table() {

            var count = $('.table').children('tbody').children('tr:first-child').children('td').length;

            var input, filter, table, tr, td, i;
            input = document.getElementById("search_input_all");
            var input_value = document.getElementById("search_input_all").value;
            filter = input.value.toLowerCase();
            if (input_value != '') {
                table = document.getElementById("table-id");
                tr = table.getElementsByTagName("tr");
                for (i = 1; i < tr.length; i++) {

                    var flag = 0;

                    for (j = 0; j < count; j++) {
                        td = tr[i].getElementsByTagName("td")[j];
                        if (td) {

                            var td_text = td.innerHTML;
                            if (td.innerHTML.toLowerCase().indexOf(filter) > -1) {
                                //var td_text = td.innerHTML;  
                                //td.innerHTML = 'shaban';
                                flag = 1;
                            } else {
                                //DO NOTHING
                            }
                        }
                    }
                    if (flag == 1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            } else {
                //RESET TABLE
                $('#maxRows').trigger('change');
            }
        }
    </script>
</head>

<body>
    <div class="container-fluid" id="table-id">
        <h2 style="font-weight: 600;color: darkslategrey;text-align: center;">VACCINATION CENTER</h2>
        <div class="tb_search">
            <input type="text" id="search_input_all" onkeyup="FilterkeyWord_all_table()" placeholder="Search.." class="form-control">
        </div>
        <table class="table table-striped">
            <thead>
                <tr class="bg-primary">
                    <th scope="col">Center Id</th>
                    <th scope="col">center name</th>
                    <th scope="col">address</th>
                    <th scope="col">pincode</th>
                    <th scope="col">IsOpen</th>
                    <th scope="col">capacity</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <?php include_once("./repo.php");
            $result = getCenter() ?>
            <tbody>
                <?php while ($row = mysqli_fetch_array($result)) { ?>
                    <tr>
                        <td value="<?php echo $row['center_id']; ?>"><?php echo $row['center_id']; ?></td>
                        <td value="<?php echo $row['center_name']; ?>"><?php echo $row['center_name']; ?></td>
                        <td value="<?php echo $row['address']; ?>"><?php echo $row['address']; ?></td>
                        <td value="<?php echo $row['pincode']; ?>"><?php echo $row['pincode']; ?></td>
                        <td value="<?php echo $row['isOpen']; ?>"><?php echo $row['isOpen']; ?></td>
                        <td value="<?php echo $row['capacity']; ?>"><?php echo $row['capacity']; ?></td>
                        <td>
                            <?php if ($_SESSION['username'] == "user") { ?>
                                <a href="schedule.php">
                                    <button class="btn btn-primary">select</button>
                                </a>
                            <?php } ?>
                            <?php if ($_SESSION['username'] == "employee") { ?>
                                <?php if ($row['isOpen'] == "no") { ?>
                                    <a href="open.php?oid=<?php echo ($row['center_id']); ?>" onclick="return confirm('Do you really want to open ?');">
                                        <button class="btn btn-danger">open</button>
                                    </a>
                                <?php } ?>
                                <?php if ($row['isOpen'] == "yes") { ?>
                                    <a href="close.php?cid=<?php echo ($row['center_id']); ?>" onclick="return confirm('Do you really want to close ?');">
                                        <button class="btn btn-danger">Close</button>
                                    </a>
                            <?php }
                            } ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>

<div style="padding-top: 10px; padding-bottom: 0px;position:fixed;bottom:0;width:100%;">
    <?php include_once('./footer.php'); ?>
</div>