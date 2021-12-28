<?php
include('./schedule.php');
$to = 'demohtc88@gmail.com';
$subject = 'Vaccination Shedule';
$body = "<html>

<Body>
    <h3>Thanks for reaching our team </h3> <br>
    <h1>IMPORTANT! Do not miss the slot</h1> <br>
    <h3>your vaccination is sheduled at $date</h3><br>
    <p>Thankyou have a nice day.</p>
</Body>

</html>";
$from = 'demohtc88@gmail.com';

// Sending email
if (mail($to, $subject, $body)) {
    echo "<script>window.location.href = 'login.php'</script>";
}
?>
