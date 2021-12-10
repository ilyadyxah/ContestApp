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
        <h1>Для Word</h1>
        <form action="word.php" method="post" accept-charset="UTF-8">
            <textarea name="text" id="txt" cols="60" rows="40" style="background-color: bisque"></textarea><br>
            <input type="text" name="mesto" placeholder="Введите место" style="width: 230px; height: 30px"><br>
            <input type="submit" style="width: 463px; height: 30px">
        </form>
    </div>
    <div style="margin: 0 10px">
        <h1>Доминанта (без темы)</h1>
        <form action="mail_dominanta.php" method="post" accept-charset="UTF-8">
            <textarea name="text" id="txt" cols="60" rows="40" style="background-color: bisque"></textarea><br>
            <input type="text" name="mesto" placeholder="Введите место" style="width: 230px; height: 30px"><br>
            <input type="submit" style="width: 463px; height: 30px">
        </form>
    </div>
    <div style="margin: 0 10px">
        <h1>Другие (с темой)</h1>
        <form action="other.php" method="post" accept-charset="UTF-8">
            <textarea name="text" id="txt" cols="60" rows="40" style="background-color: bisque"></textarea><br>
            <input type="text" name="mesto" placeholder="Введите место" style="width: 230px; height: 30px"><br>
            <input type="submit" style="width: 463px; height: 30px">
        </form>
    </div>
    <div class="response">

    </div>

</body>
<script src="response.js"></script>
</html>





