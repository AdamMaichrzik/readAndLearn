<?php        
    if(isset($_POST['rememberWord']))
    {
        require_once "../dbconnect.php";
        //connect to mysqli database (Host/Username/Password)
        $connection = mysqli_connect($host, $user, $password) or die("Error " . mysqli_error());
        //select MySQLi dabatase table
        $db = mysqli_select_db($connection, "serwer69488_Playground") or die("Error " . mysqli_error());  
        $sql = mysqli_query($connection, "SELECT * FROM activeWords");
        //Sending data to DB
        $sql = $connection -> 
        query("UPDATE `activeWords` SET `activeEnglishWord`=".$_COOKIE['learnWordCookie'].",`activeEnglishTypeWord`= ".$_COOKIE['typeWordCookie']."");
        echo '<script>window.location = "englishLanguageMainPage.html";</script>';
    }   
?>

<?php        
    if(isset($_POST['rememberWord']))
    {
        require_once "../dbconnect.php";
        //connect to mysqli database (Host/Username/Password)
        $connection = mysqli_connect($host, $user, $password) or die("Error " . mysqli_error());
        //select MySQLi dabatase table
        $db = mysqli_select_db($connection, "serwer69488_Playground") or die("Error " . mysqli_error());  
        $sql = mysqli_query($connection, "SELECT * FROM englishWordsTable");
    } 

    $phpID = $_COOKIE["englishWordRememberedID"];
    $phpEnglishWordRemember = $_COOKIE['isEnglishWordRememberedCookie'];
    $phpTableLength = $_COOKIE['columnLengthCookie'];
    $i = 0;
    $phpEnglishWordRememberPointsNoCommas = str_replace(',', '', $phpEnglishWordRemember);

    while($i < $phpTableLength)
    {
        $sql = $connection -> 
        query("UPDATE `englishWordsTable` SET `isEnglishWordRemembered`= ".$phpEnglishWordRememberPointsNoCommas[$i]." WHERE wordID = ".$i."");
        $i++;
    }
?>