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

    <?php include 'sendWordToDB.php';?>

</head>
<body>
    <div class="container">
        <!-- Menu -->
        <div class="row">
            <div class="col-12"> 
               <a href="index.html"> Back to menu</a>
            </div>
        </div>
        <div class="row">
            <div style="margin: auto; text-align:center;">
                <!-- Form with inputs for sql database -->
                <form method="post">
                    <input name="AddEnglishWord" type="text" placeholder="Type English Word">
                    <br/> <br/>
                    <input name="AddEnglishSentence" type="text" placeholder="Type english sentence">
                    <br/><br/>
                    <input name="AddPolishWord" type="text" placeholder="Type Polish Translation">
                    <br/> <br/>
                    <input name="AddPolishSentence" type="text" placeholder="Type polish sentence">
                    <br/><br>
                    <button name="AddWordButton" style="color: red;" >Add word</button>
                </form>
            </div>
        </div> 
        <div class="row">
            <div id="error"></div>
        </div>
    </div>
    
    <!-- Bootstrap script -->  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>