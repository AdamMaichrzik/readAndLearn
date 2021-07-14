<?php        
    if(isset($_POST['rememberWord']))
    {
        require_once "../dbconnect.php";
        //connect to mysqli database (Host/Username/Password)
        $connection = mysqli_connect($host, $user, $password) or die("Error " . mysqli_error());
        //select MySQLi dabatase table
        $db = mysqli_select_db($connection, "serwer69488_Playground") or die("Error " . mysqli_error());  
        $sql = mysqli_query($connection, "SELECT * FROM activeWords");

        $sql = $connection -> 
        query("UPDATE `activeWords` SET `activeGermanWord`=".$_COOKIE['learnGermanWordCookie'].",`activeGermanTypeWord`= ".$_COOKIE['typeGermanWordCookie']."");
        echo '<script>window.location = "germanLanguageMainPage.html";</script>';
    }               
?>