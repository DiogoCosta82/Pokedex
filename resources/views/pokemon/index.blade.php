<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pokedex</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <table class="table">
        <tr>
            <td>Nom</td>
            <td>Type</td>
            <td>Attaque</td>
            <td>Défense</td>
            <td>Point de vie</td></tr>
            @foreach ($pokedex as $name => $pokemon)
                <tr>
                    <td>{{ $name }}</td>
                    <td>{{ $pokemon['type'] }}</td>
                    <td>{{ $pokemon['attaque'] }}</td>
                    <td>{{ $pokemon['defense'] }}</td>
                    <td>{{ $pokemon['pv'] }}</td>
                </tr>
            @endforeach
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>