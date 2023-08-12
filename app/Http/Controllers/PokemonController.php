<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PokemonController extends Controller
{
    private $pokedex = [
        'Bulbizarre' => [ 'type' => 'Plante', 'attaque' => 49, 'defense' => 49, 'pv' => 45, 'image' => 'bulbizarre.png'],
        'Salamèche' => [ 'type' => 'Feu', 'attaque' => 52, 'defense' => 43, 'pv' => 39, 'image' => 'salameche.png', ],
        'Carapuce' => [ 'type' => 'Eau', 'attaque' => 48, 'defense' => 65, 'pv' => 44, 'image' => 'carapuce.png', ]
    ];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pokemon.index')->with(['pokedex' => $this->pokedex]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pokemon.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (isset($request->name) &&
          isset($request->type) &&
          isset($request->attaque) &&
          isset($request->defense) &&
          isset($request->pv)){
            $name = $request->name;
            $type = $request->type;
            $attaque = $request->attaque;
            $defense = $request->defense;
            $pv = $request->pv;

            $this->pokedex[] = [ $name => [ 'type' => $type, 'attaque' => $attaque, 'defense' => $defense, 'pv' => $pv]];
            // Enregistrer le nouveau pokedex (JSON par exemple)
            return "<table><tr><td><img src='images/pokemon.png' width=200></td><td>$name<hr><ul><li>$type</li><li>$attaque</li><li>$defense</li><li>$pv</li><ul></td></tr></table>";
        }

        return response("Invalid Data", 503)->header('content/type', 'text/plain');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if(array_key_exists($id, $this->pokedex)){
            return "$id<hr><img src='/images/".$this->pokedex[$id]['image']."' width=200>"
            ."<dl>"
            ."<dt>Type</dt><dd>".$this->pokedex[$id]['type']."</dd>"
            ."<dt>Attaque</dt><dd>".$this->pokedex[$id]['attaque']."</dd>"
            ."<dt>Défense</dt><dd>".$this->pokedex[$id]['defense']."</dd>"
            ."<dt>PV</dt><dd>".$this->pokedex[$id]['pv']."</dd><ul>";
        }
        return response("Invalid Pokemon Name", 404)->header('content/type', 'text/plain');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if(array_key_exists($id, $this->pokedex)){
            return "<h1>Modification d'un pokemon</h1>
            <form method='post' action='/pokemons/$id'>
            <input type='hidden' name='_method' value='put'>
            <input type='text' name='name' value='".$id."'><br>
            <input type='text' name='type' value='".$this->pokedex[$id]['type']."'><br>
            <input type='text' name='attaque' value='".$this->pokedex[$id]['attaque']."'><br>
            <input type='text' name='defense' value='".$this->pokedex[$id]['defense']."'><br>
            <input type='text' name='pv' value='".$this->pokedex[$id]['pv']."' ><br>
            <input type='submit' name='cmd' value='Modifier'>
            </form>";    
        }
        return response("Invalid Pokemon Name", 404)->header('content/type', 'text/plain');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (isset($request->name) &&
          isset($request->type) &&
          isset($request->attaque) &&
          isset($request->defense) &&
          isset($request->pv)){
            $name = $request->name;
            $type = $request->type;
            $attaque = $request->attaque;
            $defense = $request->defense;
            $pv = $request->pv;

            $this->pokedex[$id] = [ $name => [ 'type' => $type, 'attaque' => $attaque, 'defense' => $defense, 'pv' => $pv]];
            // Enregistrer le nouveau pokedex (JSON ou Cookie... par exemple...)
            return "<table><tr><td>$name<hr><ul><li>$type</li><li>$attaque</li><li>$defense</li><li>$pv</li><ul></td></tr></table>";
        }

        return response("Invalid Data", 503)->header('content/type', 'text/plain');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if(array_key_exists($id, $this->pokedex)){

            return "<h1>Pokemon Effacé</h1>$id<hr><img src='/images/".$this->pokedex[$id]['image']."' width=200>"
            ."<dl>"
            ."<dt>Type</dt><dd>".$this->pokedex[$id]['type']."</dd>"
            ."<dt>Attaque</dt><dd>".$this->pokedex[$id]['attaque']."</dd>"
            ."<dt>Défense</dt><dd>".$this->pokedex[$id]['defense']."</dd>"
            ."<dt>PV</dt><dd>".$this->pokedex[$id]['pv']."</dd><ul>";
        }
        return response("Invalid Pokemon Name", 404)->header('content/type', 'text/plain');
    }
}
