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
    <h1>Création d'un nouveau pokemon</h1>
    <form method='post' action='/pokemons'>
    <input type='text' name='name' placeholder='Name'><br>
    <input type='text' name='type' placeholder='Type'><br>
    <input type='text' name='attaque' placeholder='Attaque'><br>
    <input type='text' name='defense' placeholder='Défense'><br>
    <input type='text' name='pv' placeholder='Point de vie'><br>
    <input type='submit' name='cmd' value='Créer'>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>