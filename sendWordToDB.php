<?php
    require_once "dbconnect.php";
    //connect to mysqli database (Host/Username/Password)
    $connection = mysqli_connect($host, $user, $password) or die("Error " . mysqli_error());
    //select MySQLi dabatase table
    $db = mysqli_select_db($connection, "serwer69488_Playground") or die("Error " . mysqli_error());  
    $sql = mysqli_query($connection, "SELECT * FROM englishWordsTable");

    //Loop for getting the array from sql ID table
    while($row = mysqli_fetch_array($sql))
    {
        $ID[] = $row['ID'];
    }  
    //Setting the max number of ID's
    $IDCount = count($ID);
    //Setting the variables from HTML input form
    $EnglishWord = isset($_POST['AddEnglishWord']) ? $_POST['AddEnglishWord'] : '';
    $EnglishSentence = isset($_POST['AddEnglishSentence']) ? $_POST['AddEnglishSentence'] : '';
    $PolishWord = isset($_POST['AddPolishWord']) ? $_POST['AddPolishWord'] : '';
    $PolishSentence = isset($_POST['AddPolishSentence']) ? $_POST['AddPolishSentence'] : '';

    if(isset($_POST['AddWordButton']))
    {
        if(empty($IDCount and $EnglishWord and $PolishWord and $EnglishSentence and $PolishSentence))
        {
            echo "Error, please fill all the fields!";
        }
        else
        {
            $sql = $connection -> query ("INSERT INTO englishWordsTable (ID, EnglishWords, PolishWords, EnglishSentence, PolishSentence)
            VALUES ('".$IDCount."', '".$EnglishWord."', '".$PolishWord."', '".$EnglishSentence."', '".$PolishSentence."')");
        }
    }
?>