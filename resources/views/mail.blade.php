<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Price Changed Notification</title>
</head>
<body>
<p>Ви підписались на розсилку оголошення  {{ $product->name }}</p>
<p>Ціна: {{ $product->price }}</p>
<p>Докладніше на сайті: <a href="{{ $product->url }}">{{ $product->url }}</a></p>
</body>
</html>
