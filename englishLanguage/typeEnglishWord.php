<!DOCTYPE HTML>
<html>
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
    <link href="../CSS/style.css" rel="stylesheet">

    <!-- PHP file for getting the words from SQL DB-->
    <?php include 'getEnglishWords.php';?>
    <?php include 'sendEnglishActiveWord.php';?>

</head>
<body onload="showKeyboard(), startWord()">
    <div class="container">
        <!-- Menu -->
        <div class="row text-center" style="margin-top: 5%">
            <div class="col-12" > 
                <form method="post">
                    <button class="mainButton" name="rememberWord" style="background-color: #f94144; border-radius: 12px; color: #f9c74f;"> Back to menu</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div id="heart1" class="col-2">
                <img src="../heart.jpeg" class="img-fluid" alt="">
            </div>
            <div id="heart2" class="col-2">
                <img src="../heart.jpeg" class="img-fluid" alt="">
            </div>
            <div id="heart3" class="col-2">
                <img src="../heart.jpeg" class="img-fluid" alt="">
            </div>
        </div>
        <div class="text-center" id="englishWord"></div>
        <div class="text-center" id="polishWord" style="display: none;"></div>
        <div class="text-center" id="typedPolishWord" style="height: 50px; margin-top: 3%;"></div>

        <div class="row mt-5">
            <textarea style="color:transparent; background-color: #293241" class="col-12" autofocus id="typeingPolishTranslationID" cols="100%" rows="1"> </textarea>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        var activeEnglishTypeWord = <?php echo json_encode($activeEnglishTypeWord); ?>;
        var wordNumber = activeEnglishTypeWord [0];
        var EnglishWords = <?php echo json_encode($EnglishWords); ?>;
        var PolishWords = <?php echo json_encode($PolishWords); ?>;
        var sliceEnglishWordNumber = 0;
        var wrongLetter = 3;

    // Click to the textarea input to show keyboard on mobile
    function showKeyboard()
    {
        document.getElementById("typeingPolishTranslationID").click();
    }
    function startWord()
    {
        document.getElementById("englishWord").innerHTML = EnglishWords[wordNumber];
        document.getElementById("polishWord").innerHTML = PolishWords[wordNumber];
    }

    //Comparing the letter from textarea with english word
    function checkingTheLetter(message) 
    {
        typeingPolishTranslationID.value = "";


        if(document.getElementById("polishWord").innerHTML.slice(sliceEnglishWordNumber, (sliceEnglishWordNumber + 1)) == message)
        {
            document.getElementById("typedPolishWord").innerHTML = document.getElementById("typedPolishWord").innerHTML + message;
            sliceEnglishWordNumber ++; 
        }

        else
        {
            document.getElementById("heart" + wrongLetter).innerHTML = "";
            wrongLetter --;
            if(wrongLetter < 1)
            {
                document.getElementById("polishWord").style.display = "block";
                document.getElementById("polishWord").innerHTML = PolishWords[wordNumber];
            }
        }

        if(document.getElementById("polishWord").innerHTML == document.getElementById("typedPolishWord").innerHTML)
        {
            sliceEnglishWordNumber = 0;
            wordNumber++;
            document.getElementById("typedPolishWord").innerHTML = "";
            document.getElementById("englishWord").innerHTML = EnglishWords[wordNumber];
            document.getElementById("polishWord").innerHTML = PolishWords[wordNumber];
            wrongLetter = 3;
            document.getElementById("heart1").innerHTML = '<img src="../heart.jpeg" class="img-fluid" alt="">';
            document.getElementById("heart2").innerHTML = '<img src="../heart.jpeg" class="img-fluid" alt="">';
            document.getElementById("heart3").innerHTML = '<img src="../heart.jpeg" class="img-fluid" alt="">';
            document.getElementById("polishWord").style.display = "none";
        
        /* Going to the first word from last  */
         if(wordNumber + 1 > EnglishWords.length)
            {
                document.getElementById("polishWord").innerHTML = PolishWords[0];
                document.getElementById("englishWord").innerHTML = EnglishWords[0];
                wordNumber = 0;
            }
        }
        document.cookie="typeWordCookie = " + wordNumber;
    }

        // Getting the input key
        let typedPolishTranslation = document.getElementById("typeingPolishTranslationID");
        typedPolishTranslation.addEventListener('keydown', (e) => 
        {
            checkingTheLetter(`${e.key}`);
        });

    </script>
    
    <!-- Bootstrap script -->  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>