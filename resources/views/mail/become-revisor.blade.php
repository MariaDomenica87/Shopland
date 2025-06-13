<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ShopLand</title>
</head>

<body>
    <section class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>ShopLand</h1>
                <h2>Un utente ha chiesto di lavorare con noi.</h2>
                <h3>Ecco i suoi dati:</h3>
                <p>Nome:<strong>{{ $user->name }}</strong></p>
                <p>Email:<strong>{{ $user->email }}</strong></p>

                <p>Se vuoi renderl* revisor, clicca qui:</p>
                <a href="{{ route('make.revisor', compact('user')) }}">Rendi revisor</a>
                <p>Grazie!</p>
            </div>
        </div>
    </section>


</body>

</html>
