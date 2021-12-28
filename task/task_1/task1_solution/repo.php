<?php include('./db.php');


function closeCenter($cid , $isOpen)
{
    global $con;
    $status = false;
    $query = "UPDATE `vaccination_center` SET isOpen=? WHERE center_id=?";
    $statement = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($statement, 'si', $isOpen, $cid );
    $exc_status = mysqli_stmt_execute($statement); 
    if ($exc_status) {
        $var = mysqli_affected_rows($con);
        if ($var == 1) {
            $status = true;
        }
    }
    return $status;
}

function openCenter($oid , $isOpen)
{
    global $con;
    $status = false;
    $query = "UPDATE `vaccination_center` SET isOpen=? WHERE center_id=?";
    $statement = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($statement, 'si', $isOpen, $oid );
    $exc_status = mysqli_stmt_execute($statement); 
    if ($exc_status) {
        $var = mysqli_affected_rows($con);
        if ($var == 1) {
            $status = true;
        }
    }
    return $status;
}

function createUser($fname, $middle_name, $lname, $aadhar, $email, $phoneNo, $address, $pincode)
{
    global $con;
    $status = false;
    $query = "INSERT INTO `person`(`first_name`, `middle_name`, `last_name`, `social_identification_no`, `email`, `phone_no`, `address`, `pincode`)
    values(?,?,?,?,?,?,?,?)";

    $statement = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($statement, 'ssssssss',  $fname, $middle_name, $lname, $aadhar, $email, $phoneNo, $address, $pincode);
    $exc_status = mysqli_stmt_execute($statement);
    if ($exc_status) {
        $var = mysqli_affected_rows($con);
        if ($var == 1) {
            $status = true;
        }
    }
    return $status;
}

function deletedata($id)
{
    global $con;
    $status = false;
    $query = "DELETE from `person` WHERE person_id=?";
    //preparing the statement
    $statement = mysqli_prepare($con, $query); //returns mysqli_statement
    mysqli_stmt_bind_param($statement, 'i', $id); //binding parameter to the statement
    //executing the statement
    $exc_status = mysqli_stmt_execute($statement); //return  boolean
    if ($exc_status) {
        $var = mysqli_affected_rows($con); //Returns a resultset or FALSE on failure.
        //For inserting result will return true.
        if ($var == 1) {
            $status = true;
        }
    }
    return $status;
}

function getCenter()
{
    global $con;
    $query = "SELECT `center_id`, `center_name`, `address`, `pincode`, `isOpen`, `capacity` FROM `vaccination_center`";
    $result1 = mysqli_query($con, $query);
    return $result1;
}

function getPerson()
{
    global $con;
    $query = "SELECT `person_id`, `first_name`, `middle_name`, `last_name`, `social_identification_no`, `email`, `phone_no`, `address`, `pincode` 
    FROM `person`";
    $result1 = mysqli_query($con, $query);
    return $result1;
}
