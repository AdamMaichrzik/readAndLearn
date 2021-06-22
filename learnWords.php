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

    <?php include 'getWords.php';?>
</head>
<body>
    <div class="container">
        <!-- Menu -->
        <div class="row">
            <div class="col-12"> 
               <a href="index.html"> Back to menu</a>
            </div>
        </div>
        <!-- Polish words-->
        <div class="row">
            <button type="button" onClick="polishClick()">
                <div class="col-12" style="text-align: center; height: 100px; color: red;" id="polishWordDiv"></div>
                <div class="col-12" style="text-align: center; height: 100px; color: red;" id="polishSentenceDiv"></div>
            </button>
        </div>
        <!-- Border line -->
        <div class="row" style="border-top: 3px solid #E8E8E8; margin-top: 3%; margin-bottom: 3%;"></div>
        <!-- English words-->
        <div class="row">
            <button type="button" onClick="englishClick()">
                <div class="col-12" style="text-align: center; height: 100px; color: red;" id="englishWordDiv"></div>
                <div class="col-12" style="text-align: center; height: 100px; color: red;" id="englishSentenceDiv"></div>    
            </button>
        </div>
        <!-- Buttons -->
        <div class="row" style="margin-top: 21%;">
            <div class="col-4">
                <button type="button" onclick="yesButton()" class="btn btn-light">Yes</button>
            </div>
            <div class="col-4">
                <button type="button" onclick="middleButton()" class="btn btn-light">Middle</button>
            </div>
            <div class="col-4">
                <button type="button" class="btn btn-light">No</button>
            </div>
        </div>
    </div>
    
    <!-- Reading file from php and putting into divs -->
    <script>
        var WordID = <?php echo json_encode($WordID); ?>;
        var PolishWords = <?php echo json_encode($PolishWords); ?>;
        var PolishSentence = <?php echo json_encode($PolishSentence); ?>;
        var EnglishWords = <?php echo json_encode($EnglishWords); ?>;
        var EnglishSentence = <?php echo json_encode($EnglishSentence); ?>;
        var topClick = 0;
        var bottomClick = 0;
        var wordNumber = 0;

        function polishClick()
        {
            if (topClick == 0)
            {
                document.getElementById("polishWordDiv").innerHTML = PolishWords[wordNumber];
                topClick += 1;
            }
            else if(topClick == 1)
            {
                document.getElementById("polishSentenceDiv").innerHTML = PolishSentence[wordNumber];
            }
        }

        function englishClick()
        {
            if (bottomClick == 0 )
            {
                document.getElementById("englishWordDiv").innerHTML = EnglishWords[wordNumber];
                bottomClick += 1;
            }
            else if(bottomClick == 1)
            {
                document.getElementById("englishSentenceDiv").innerHTML = EnglishSentence[wordNumber];
            }
        }

        function yesButton()
        {
            if(document.getElementById("englishWordDiv").innerHTML == "")
            {
                return;
            }
            if(wordNumber + 1 > PolishWords.length - 1)
            {
                wordNumber = 0;
                bottomClick = 0;
                document.getElementById("polishWordDiv").innerHTML = PolishWords[wordNumber];
                document.getElementById("polishSentenceDiv").innerHTML = "";
                document.getElementById("englishWordDiv").innerHTML = "";
                document.getElementById("englishSentenceDiv").innerHTML = "";
            }
            else
            {
                bottomClick = 0;
                wordNumber++;
                document.getElementById("polishWordDiv").innerHTML = PolishWords[wordNumber];
                document.getElementById("polishSentenceDiv").innerHTML = "";
                document.getElementById("englishWordDiv").innerHTML = "";
                document.getElementById("englishSentenceDiv").innerHTML = "";
            }

        }

        function middleButton()
        {

            document.getElementById("englishWordDiv").innerHTML = EnglishWords[wordNumber];
        }

    </script>

    <!-- Bootstrap script -->  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>