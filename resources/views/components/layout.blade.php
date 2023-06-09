<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Lora&family=Montserrat:ital@1&display=swap" rel="stylesheet">
     @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>Aulab Post</title>
</head>

<body>

    <x-navbar />

    <div class="min-vh-100">

        {{ $slot }}

    </div>

    <x-footer />

</body>

</html>
