<?php
        /* Connection with sql */
        require_once "dbconnect.php";
        $connection = mysqli_connect($host, $user, $password) or die ("Error " . mysqli_error());
        $db = mysqli_select_db($connection, "serwer69488_Playground") or die ("Error " . mysqli_error());
        $sql = mysqli_query($connection, "SELECT * FROM words");

        /* Loop for taking the data from sql and putting it into php arrays */
        while($row = mysqli_fetch_array($sql))
        {
            $WordID[] = $row["ID"];
            $EnglishWords[] = $row["EnglishWords"];
            $EnglishSentence[] = $row["EnglishSentence"];
            $PolishWords[] = $row["PolishWords"];
            $PolishSentence[] = $row["PolishSentence"];
        }
?>