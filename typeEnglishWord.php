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
    <link href="style.css" rel="stylesheet">

</head>
<body onload="showKeyboard()">
    <div class="container">
        <!-- Menu -->
        <div class="row">
            <div class="col-12 text-center"> 
               <a href="index.html" style="background-color: #f94144; border-radius: 12px; color: #f9c74f;"> Back to menu</a>
            </div>
        </div>
        <div class="text-center" id="englishWord">House</div>
        <div class="text-center" id="polishWord" style="display: none;">Dom</div>
        <div class="text-center" id="typingPolishWord"></div>

        <div class="row mt-5">
            <textarea class="col-12" autofocus style="color: white;" name="typedPolishTranslation" id="typedPolishTranslationID" cols="100%" rows="1"> </textarea>
        </div>

    </div>

    <!-- Scripts -->

    <script>

function showKeyboard()
{
    document.getElementById("typedPolishTranslationID").click();
}

    var sliceEnglishWordNumber = 0;
    //Comparing the key
    function logMessage(message) 
    {
        
        if(document.getElementById("polishWord").innerHTML.slice(sliceEnglishWordNumber, (sliceEnglishWordNumber + 1)) == message)
        {
            console.log(sliceEnglishWordNumber);
            document.getElementById("typingPolishWord").innerHTML = document.getElementById("typingPolishWord").innerHTML + message;
            sliceEnglishWordNumber ++; 
        }
    }

        // Getting the input key
        let typedPolishTranslation = document.getElementById("typedPolishTranslationID");
        typedPolishTranslation.addEventListener('keydown', (e) => {
            logMessage(`${e.key}`);
        });
    </script>
    
    <!-- Bootstrap script -->  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>