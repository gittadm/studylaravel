<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8"/>
    <title>HTML5</title>
</head>
<body>
    <h1>Привет как дела</h1>
Количество: {{ $count }} <hr>

@foreach($prices as $price)
    <p>
        {{ $price }}
    </p>
@endforeach

@if($count > 50)
    !!!
@else
    ???
@endif

</body>
</html>
