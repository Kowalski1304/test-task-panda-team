<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Price Changed Notification</title>
</head>
<body>
<p>Ціна оголошення змінилась -  {{ $product->name }}</p>
<p>Нова ціна: {{ $product->price }}</p>
<p>Докладніше на сайті: <a href="{{ $product->url }}">{{ $product->url }}</a></p>
</body>
</html>
