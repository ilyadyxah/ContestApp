<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contest</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
        <form action="Olympiads/word.php" method="post" accept-charset="UTF-8" style="display: flex; flex-direction: column; align-items: center">
            <textarea name="text" class="form-control" id="txt" cols="80" rows="25" style="background-color: bisque"></textarea>
            <input type="text" class="form-control" name="place" placeholder="Введите место">
            <select name="age" class="form-select">
                <option disabled selected>Выберите возрастную категорию</option>
                <option value="возрастная категория: до 7 лет (включительно)"> до 7 (включительно)</option>
                <option value="возрастная категория: 8-10 лет"> 8 - 10</option>
                <option value="возрастная категория: 11-13 лет">11 - 13</option>
                <option value="возрастная категория: 14-15 лет">14 - 15</option>
                <option value="возрастная категория: 16-19 лет">16 - 19</option>
                <option value="возрастная категория: 20-26 лет">20 - 26</option>
                <option value="возрастная категория: от 26 лет и старше"> от 26</option>
                <option value="возрастная категория: смешанная">Смешанная</option>
            </select>
            <select name="nominate" class="form-select">
                <option disabled selected>Выберите номинацию</option>
                <option value="в номинации «Солисты»">Солисты</option>
                <option value="в номинации «Дуэты»">Дуэты</option>
                <option value="в номинации «Ансамбли (учащиеся)»">Ансамбли(учащиеся)</option>
                <option value="в номинации «Ансамбли (педагог – ученик)»">Ансамбли(педагог-ученик)</option>
            </select>
            <div style="width: 80%; margin: 5px;">
                <p style="margin: 0">Олимпиады</p>
                <input name="btn_wtheme" type="button" value="Без темы" class="response1 btn btn-primary" style="width: 163px; height: 30px">
                <input name="btn_word" type="button" value="Word" class="response2 btn btn-primary" style="width: 163px; height: 30px">
                <input name="btn_theme" type="button" value="С темой" class="response3 btn btn-primary" style="width: 163px; height: 30px">
            </div>
            <div style="width: 80%">
                <p style="margin: 5px">Конкурсы</p>
                <input name="btn_royal" type="button" value="Рояль mail" class="response4 btn btn-primary" style="width: 163px; height: 30px">
                <input name="btn_wroyal" type="button" value="Рояль word" class="response5 btn btn-primary" style="width: 163px; height: 30px">
            </div>

        </form>
    </div>
    <div class="response_text">
    </div>

</body>
<script src="Olympiads/response.js"></script>
<script src="Contests/response.js"></script>
</html>





