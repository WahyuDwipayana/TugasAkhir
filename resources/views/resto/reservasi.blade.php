<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Tutor Deckk</h1>
    <a href="https://www.malasngoding.com/category/laravel">www.malasngoding.com</a>    
    <br>
    <p>Nama : {{$nama}}</p>
    <p>Jenis :</p>
    <ul>
        @foreach($jenis as $j)
        <li>{{$j}}</li>
        @endforeach
    </ul>
</body>
</html>