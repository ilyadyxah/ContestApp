<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            background-color: #403a3acf;
            color: white;
            font-size: 20px;
        }
    </style>
</head>
<body style="display: flex; margin: 0 10px">
    <div style="margin: 0 10px">
        <form action="word.php" method="post" accept-charset="UTF-8" style="display: flex; flex-direction: column; align-items: center">
            <textarea name="text" id="txt" cols="70" rows="40" style="background-color: bisque"></textarea>
            <input type="text" name="mesto" placeholder="Введите место" style="width: 120px; height: 30px">
            <div>
                <input name="btn_wtheme" type="button" value="Без темы" class="response1" style="width: 163px; height: 30px">
                <input name="btn_word" type="button" value="Word" class="response2" style="width: 163px; height: 30px">
                <input name="btn_theme" type="button" value="С темой" class="response3" style="width: 163px; height: 30px">
            </div>

        </form>
    </div>
    <div class="response_text">
    </div>

</body>
<script src="response.js"></script>
</html>





