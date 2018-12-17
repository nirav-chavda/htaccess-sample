<?php include "csrf.php";

    //if(isset($_POST['submit'])) {
        
        if(check_valid("post")) {
        
            echo $_POST['email'] . " " . $_POST['pswrd'];

            $myfile = fopen("newfile.txt", "a") or die("Unable to open file!");
            
            fwrite($myfile, $_POST['email']." - ". $_SESSION['token_id'] . " - " . get_ip() ."\n");
            
            fclose($myfile);

            echo "enter";

            header("Location:form");
        
        } else {

            $myfile = fopen("newfile.txt", "a") or die("Unable to open file!");
            
            fwrite($myfile, "Someone tried csrf " . $_POST['email']."  ". get_ip() ."\n");
            
            fclose($myfile);

            echo "csrf";

            header('Location:error_pages/401');
        }
    // } else {
    //     echo "<h1>Bad Request</h1>";
    // }

    function get_ip() {

        $ipaddress = '';

        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';

        return $ipaddress;    
    }
?>