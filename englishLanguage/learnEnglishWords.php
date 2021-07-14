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

    <!-- CSS -->
    <link href="../CSS/style.css" rel="stylesheet">

    <!-- PHP file for getting the words from SQL DB-->
    <?php include 'getEnglishWords.php';?>
    <?php include 'sendEnglishActiveWord.php';?>

</head>
<!-- Onload function for displaying first word -->
<body onload="startWord()">
    <div class="container">
        <!-- Menu -->
        <div class="row text-center" style="margin-top: 5%">
            <div class="col-12" > 
                <form method="post">
                    <button class="mainButton" name="rememberWord" style="background-color: #f94144; border-radius: 12px; color: #f9c74f;"> Back to menu</button>
                </form>
            </div>
        </div>
        <!-- Polish words-->
        <div class="row">
            <button type="button" class="reset-Button" onClick="polishClick()">
                <div class="col-12" style="text-align: center; height: 75px; color: #f9c74f; font-size: 8vw;" id="polishWordDiv"></div>
                <div class="col-12" style="text-align: center; height: 75px; color: #f9c74f; font-size: 8vw;" id="polishSentenceDiv"></div>
            </button>
        </div>
        <!-- Border line -->
        <div class="row" style="border-top: 3px solid #E8E8E8; margin-top: 3%; margin-bottom: 3%;"></div>
        <!-- English words-->
        <div class="row">
            <button type="button" class="reset-Button" onClick="englishClick()">
                <div class="col-12" style="text-align: center; height: 75px; color: #f9c74f; font-size: 8vw;" id="englishWordDiv"></div>
                <div class="col-12" style="text-align: center; height: 75px; color: #f9c74f; font-size: 8vw;" id="englishSentenceDiv"></div>
            </button>
        </div>
        <!-- Buttons -->
        <div class="row" style="margin-top: 3%;" >
            <div class="col-4 text-center">
                <button class="mainButton btn btn-success btn-lg" onclick="yesButton()"> Yes</button>
            </div>
            <div class="col-4 text-center">
                <form method="post">
                    <button type="button" onclick="middleButton()" class="btn btn-primary btn-lg">Middle</button>
                </form>
            </div>
            <div class="col-4 text-center">
                <button type="button" onclick="noButton()" class="btn btn-danger btn-lg">No</button>
            </div>
        </div>
    </div>
    
    <script>
        /* Reading file from php and putting into divs */
        var activeEnglishWord = <?php echo json_encode($activeEnglishWord); ?>;
        var PolishWords = <?php echo json_encode($PolishWords); ?>;
        var PolishSentence = <?php echo json_encode($PolishSentence); ?>;
        var EnglishWords = <?php echo json_encode($EnglishWords); ?>;
        var EnglishSentence = <?php echo json_encode($EnglishSentence); ?>;
        var isEnglishWordRemembered = <?php echo json_encode($isEnglishWordRemembered); ?>;
        var wordID = <?php echo json_encode($wordID); ?>;
        /* Variables */
        var topClick = 0;
        var bottomClick = 0;
        var wordNumber = activeEnglishWord[0];
        var firstWordClick = true;

        /** Function for displaying first polish word */
        function startWord()
        {
            document.getElementById("polishWordDiv").innerHTML = PolishWords[wordNumber];
        }

        /* First click display polish word second display polish sentence */
        function polishClick()
        {
            if(firstWordClick == true)
            {
                var audio = new Audio('../sounds/Words/Polish/Word' + [wordNumber] + '.mp3');
                audio.play();
                firstWordClick = false;
            }
            if (topClick == 0)
            {
                document.getElementById("polishWordDiv").innerHTML = PolishWords[wordNumber];
                topClick += 1;
            }
            else if(topClick == 1)
            {
                document.getElementById("polishSentenceDiv").innerHTML = PolishSentence[wordNumber];
                var audio = new Audio('../sounds/Sentences/Polish/Sentence' + [wordNumber] + '.mp3');
                audio.play();
            }
        }
        /* First english click display english word second display english sentence  */
        function englishClick()
        {
            if (bottomClick == 0 )
            {
                document.getElementById("englishWordDiv").innerHTML = EnglishWords[wordNumber];
                bottomClick += 1;
                var audio = new Audio('../sounds/Words/English/Word' + [wordNumber] + '.mp3');
                audio.play();
            }
            else if(bottomClick == 1)
            {
                document.getElementById("englishSentenceDiv").innerHTML = EnglishSentence[wordNumber];
                var audio = new Audio('../sounds/Sentences/English/Sentence' + [wordNumber] + '.mp3');
                audio.play();
            }
        }

        /* Functions for yes button displaying next word */
        function yesButton()
        {
            /* If english word is empty can't go next words */
            if(document.getElementById("englishWordDiv").innerHTML == "")
            {
                return;
            }
            else
            {
                /* Clear words and display another polish word */
                bottomClick = 0;
                wordNumber++;
                document.getElementById("polishWordDiv").innerHTML = PolishWords[wordNumber];
                document.getElementById("polishSentenceDiv").innerHTML = "";
                document.getElementById("englishWordDiv").innerHTML = "";
                document.getElementById("englishSentenceDiv").innerHTML = "";
                var audio = new Audio('../sounds/Words/Polish/Word' + [wordNumber] + '.mp3');
                audio.play();
            }
             /* Going to the first word from last  */
             if(wordNumber + 1 > PolishWords.length)
            {
                document.getElementById("polishWordDiv").innerHTML = PolishWords[0];
                document.getElementById("polishSentenceDiv").innerHTML = "";
                document.getElementById("englishWordDiv").innerHTML = "";
                document.getElementById("englishSentenceDiv").innerHTML = "";
                wordNumber = 0;
                bottomClick = 0;
                var audio = new Audio('sounds/Words/Polish/Word' + [wordNumber] + '.mp3');
                audio.play();
            }
            // This makes adding to rememberWords array on the last place 
            if(wordNumber == 0)
            {
                isEnglishWordRemembered[EnglishWords.length -1]++;
            }
            isEnglishWordRemembered[wordNumber - 1]++;
            console.log(wordNumber);

        /* Saving cookies  */
        document.cookie="isEnglishWordRememberedCookie = " + isEnglishWordRemembered;
        document.cookie="englishWordRememberedID = " + wordID[wordNumber -1];
        document.cookie="learnEnglishWordCookie = " + wordNumber;
        document.cookie="columnLengthCookie = " + PolishWords.length;
        }
        
        /* Functions for middle button displaying next word */
        function middleButton()
        {
                /* If english word is empty can't go next words */
                if(document.getElementById("englishWordDiv").innerHTML == "")
            {
                return;
            }
            else
            {
                /* Clear words and display another polish word */
                bottomClick = 0;
                wordNumber++;
                document.getElementById("polishWordDiv").innerHTML = PolishWords[wordNumber];
                document.getElementById("polishSentenceDiv").innerHTML = "";
                document.getElementById("englishWordDiv").innerHTML = "";
                document.getElementById("englishSentenceDiv").innerHTML = "";
                var audio = new Audio('../sounds/Words/Polish/Word' + [wordNumber] + '.mp3');
                audio.play();
            }
             /* Going to the first word from last  */
             if(wordNumber + 1 > PolishWords.length)
            {
                document.getElementById("polishWordDiv").innerHTML = PolishWords[0];
                document.getElementById("polishSentenceDiv").innerHTML = "";
                document.getElementById("englishWordDiv").innerHTML = "";
                document.getElementById("englishSentenceDiv").innerHTML = "";
                wordNumber = 0;
                bottomClick = 0;
                var audio = new Audio('sounds/Words/Polish/Word' + [wordNumber] + '.mp3');
                audio.play();
            }
            document.cookie="learnEnglishWordCookie = " + wordNumber;
        }
        /* Functions for no button displaying next word */
        function noButton()
        {
            /* If english word is empty can't go next words */
            if(document.getElementById("englishWordDiv").innerHTML == "")
            {
                return;
            }
            else
            {
                /* Clear words and display another polish word */
                bottomClick = 0;
                wordNumber++;
                document.getElementById("polishWordDiv").innerHTML = PolishWords[wordNumber];
                document.getElementById("polishSentenceDiv").innerHTML = "";
                document.getElementById("englishWordDiv").innerHTML = "";
                document.getElementById("englishSentenceDiv").innerHTML = "";
                var audio = new Audio('../sounds/Words/Polish/Word' + [wordNumber] + '.mp3');
                audio.play();
            }
             /* Going to the first word from last  */
             if(wordNumber + 1 > PolishWords.length)
            {
                document.getElementById("polishWordDiv").innerHTML = PolishWords[0];
                document.getElementById("polishSentenceDiv").innerHTML = "";
                document.getElementById("englishWordDiv").innerHTML = "";
                document.getElementById("englishSentenceDiv").innerHTML = "";
                wordNumber = 0;
                bottomClick = 0;
                var audio = new Audio('sounds/Words/Polish/Word' + [wordNumber] + '.mp3');
                audio.play();
            }
            // This makes adding to rememberWords array on the last place 
            if(wordNumber == 0)
            {
                isEnglishWordRemembered[EnglishWords.length -1]--;
            }
            isEnglishWordRemembered[wordNumber - 1]--;
            console.log(wordNumber);

        /* Saving cookies  */
        document.cookie="isEnglishWordRememberedCookie = " + isEnglishWordRemembered;
        document.cookie="englishWordRememberedID = " + wordID[wordNumber -1];
        document.cookie="learnEnglishWordCookie = " + wordNumber;
        document.cookie="columnLengthCookie = " + PolishWords.length;
        }    </script>

    <!-- Bootstrap script -->  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</body>
</html>