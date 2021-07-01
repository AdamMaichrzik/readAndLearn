<html lang="en">
<head>
    <meta content="IE=edge, chrome=1" http-equiv="X-UA-Compatible">
	<meta content="width=device-width,initial-scale=1.0" name="viewport">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="width=device-width,initial-scale=1.0" name="viewport">
    <title>Read And Learn - app for learning english from books</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

    <!-- jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="animations.css">

    <!-- CSS -->
    <link href="style.css" rel="stylesheet">

    <!-- Including php files  -->
    <?php include 'getFrenchWords.php';?>
    <?php include 'sendFrenchActiveWord.php';?>
</head>
<body onload="startWord()" style="background-color: #277da1">
    <div class="container">
        <!-- Menu -->
        <div class="row text-center" style="margin-top: 5%">
            <div class="col-12" > 
                <form method="post">
                    <button class="mainButton" name="rememberWord" style="background-color: #577590; border-radius: 12px; color: #f9c74f;"> Back to menu</button>
                </form>
            </div>
        </div>
        <!-- Polish words-->
        <div class="row">
            <button type="button" class="reset-Button" style="background-color: transparent" onClick="polishClick()">
                <div class="col-12" style="text-align: center; height: 150px; color: #f9c74f; font-size: 8vw; padding-top: 8%" id="polishWordDiv"></div>
            </button>
        </div>
        <!-- Border line -->
        <div class="row" style="border-top: 3px solid #E8E8E8; margin-top: 3%; margin-bottom: 3%;"></div>
        <!-- English words-->
        <div class="row">
            <button type="button" class="reset-Button" style="background-color: transparent" onClick="englishClick()">
                <div class="col-12" style="text-align: center; height: 150px; color: #f9c74f; font-size: 8vw; padding-top: 8%" id="frenchWordDiv"></div>
            </button>
        </div>
        <!-- Buttons -->
        <div class="row" style="margin-top: 3%;" >
            <div class="col-4 text-center" >
                <button type="button" onclick="yesButton()" class="btn btn-light">Yes</button>
            </div>
            <div class="col-4 text-center" >
                <button type="button" onclick="middleButton()" class="btn btn-light">Middle</button>
            </div>
            <div class="col-4 text-center">
                <button  type="button" class="btn btn-light">No</button>
            </div>
        </div>
    </div>
    
    <script>
        /* Reading file from php and putting into divs */
        var activeFrenchWord = <?php echo json_encode($activeFrenchWord); ?>;
        var frenchWord = <?php echo json_encode($frenchWord); ?>;
        var polishWord = <?php echo json_encode($polishWord); ?>;
        // Variables 
        var topClick = 0;
        var bottomClick = 0;
        var wordNumber = activeFrenchWord [0];

        //Displaying first polish word on start 
        function startWord()
        {
            document.getElementById("polishWordDiv").innerHTML = polishWord[wordNumber];
        }

        /* First click display polish word */
        function polishClick()
        {
            if (topClick == 0)
            {
                document.getElementById("polishWordDiv").innerHTML = polishWord[wordNumber];
                topClick += 1;
            }

        }
        /* First german click display german word*/
        function englishClick()
        {
            if (bottomClick == 0 )
            {
                document.getElementById("frenchWordDiv").innerHTML = frenchWord[wordNumber];
                bottomClick += 1;
            }
        }

        // Function for yesButton 
        function yesButton()
        {
            /* If german word is empty can't go next words */
            if(document.getElementById("frenchWordDiv").innerHTML == "")
            {
                return;
            }
            else
            {
                /* Clear words and display another polish word */
                bottomClick = 0;
                wordNumber++;
                document.getElementById("polishWordDiv").innerHTML = polishWord[wordNumber];
                document.getElementById("frenchWordDiv").innerHTML = "";
            }
             /* Going to the first word from last  */
             if(wordNumber + 1 > polishWord.length)
            {
                document.getElementById("polishWordDiv").innerHTML = polishWord[0];
                document.getElementById("frenchWordDiv").innerHTML = "";
                wordNumber = 0;
                bottomClick = 0;
            }
        // Cookie saving last showed word for displaying it next time 
        document.cookie="wordCookie = " + wordNumber;
        }
        
    </script>

    <!-- Bootstrap script -->  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</body>
</html>