<?php include "csrf.php";

    if(isset($_POST['submit'])) {
        if(check_valid("post")) {
            echo $_POST['email'] . " " . $_POST['pswrd'];
        } else {
            header("Location:error_pages/session_timeout.html");
        }
    } else {
        echo "<h1>Bad Request</h1>";
    }
?>