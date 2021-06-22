<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
        /* Connection with sql */
        require_once "dbconnect.php";
        $connection = mysqli_connect($host, $user, $password) or die ("Error " . mysqli_error());
        $db = mysqli_select_db($connection, "serwer69488_Playground") or die ("Error " . mysqli_error());
        $sql = mysqli_query($connection, "SELECT * FROM words");

        /* Loop for taking the data from sql and putting it into php arrays */
        while($row = mysqli_fetch_array($sql))
        {
            $EnglishWords[] = $row["EnglishWords"];
            $EnglishSentence[] = $row["EnglishSentence"];
            $PolishWords[] = $row["PolishWords"];
            $PolishSentence[] = $row["PolishSentence"];
        }
  
    ?>

</head>
<body>
    <div id="test"> test</div>
    <script>
        var EnglishWords = <?php echo json_encode($EnglishWords); ?>;
        document.getElementById("test").innerHTML = EnglishWords[1]
    </script>
</body>
</html>