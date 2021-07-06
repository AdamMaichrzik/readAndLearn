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
        //Sending data to DB
    } 

    $phpID = $_COOKIE["englishWordRememberedID"];
    $phpEnglishWordRemember = $_COOKIE['isEnglishWordRememberedCookie'];
    $phpTableLength = $_COOKIE['columnLengthCookie'];
    //echo $phpTableLength;
    $i = 0;

    $arrsingleresult = str_replace(',', '', $phpEnglishWordRemember);
   
    echo $phpEnglishWordRemember;echo "<br>";
    echo $phpTableLength; echo "<br>";
    echo $arrsingleresult; echo "<br>";
    echo $arrsingleresult[4]; echo "<br>";
    echo $i; echo "<br>";

    while($i <= $phpTableLength)
    {

        $sql = $connection -> 
        query("UPDATE `englishWordsTable` SET `isEnglishWordRemembered`= ".$arrsingleresult[$i]." WHERE wordID = ".$i."");

        $i++;
    }
    
?>