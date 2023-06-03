<!DOCTYPE html>
<html lang="en">
<head>
    <title>Rick and Morty Encyclopedia</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    @vite(['resources/scss/app.scss'])
</head>
<body>
    <header>
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h1><a href="/">Rick and Morty Encyclopedia</a></h1>
                </div>
            </div>
        </div>
    </header>
    @yield('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
