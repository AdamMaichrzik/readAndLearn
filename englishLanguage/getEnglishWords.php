<?php
        /* Connection with sql */
        require_once "../dbconnect.php";
        $connection = mysqli_connect($host, $user, $password) or die ("Error " . mysqli_error());
        $db = mysqli_select_db($connection, "serwer69488_Playground") or die ("Error " . mysqli_error());
        $sql = mysqli_query($connection, "SELECT * FROM englishWordsTable");

        /* Loop for taking the data from sql and putting it into php arrays */
        while($row = mysqli_fetch_array($sql))
        {
            $wordID[] = $row["wordID"];
            $EnglishWords[] = $row["EnglishWords"];
            $EnglishSentence[] = $row["EnglishSentence"];
            $PolishWords[] = $row["PolishWords"];
            $PolishSentence[] = $row["PolishSentence"];
            $isEnglishWordRemembered[] = $row["isEnglishWordRemembered"];
        }

        /* Connection with sql */
        require_once "../dbconnect.php";
        $connection = mysqli_connect($host, $user, $password) or die ("Error " . mysqli_error());
        $db = mysqli_select_db($connection, "serwer69488_Playground") or die ("Error " . mysqli_error());
        $sql = mysqli_query($connection, "SELECT * FROM activeWords");

        /* Loop for taking the data from sql and putting it into php arrays */
        while($row = mysqli_fetch_array($sql))
        {
            $activeEnglishWord[] = $row["activeEnglishWord"];
            $activeEnglishTypeWord[] = $row["activeEnglishTypeWord"];
        }
?>