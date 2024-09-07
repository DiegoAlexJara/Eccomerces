<?php

namespace Database\Seeders;

use App\Models\Marca;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MarcaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Marca = new Marca();
        $Marca->Name = 'MARVEL COMICS';
        $Marca->description = 'Conocida por sus icónicos superhéroes como Spider-Man, los X-Men y los Vengadores.';
        $Marca->color = '#c20000';
        $Marca->save();

        $Marca = new Marca();
        $Marca->Name = 'DC COMICS';
        $Marca->description = 'Famosa por personajes emblemáticos como Batman, Superman y Wonder Woman.';
        $Marca->color = '#0017c2';
        $Marca->save();

        $Marca = new Marca();
        $Marca->Name = 'IMAGE COMICS';
        $Marca->description = 'Editorial independiente que ofrece cómics innovadores como "The Walking Dead" y "Spawn".';
        $Marca->color = '#0000';
        $Marca->save();
        
        $Marca = new Marca();
        $Marca->Name = 'DARK HORSE COMICS';
        $Marca->description = 'Publica títulos de fantasía y ciencia ficción como "Hellboy" y "Sin City".';
        $Marca->color = '#6a6a6c';
        $Marca->save();

        $Marca = new Marca();
        $Marca->Name = 'VIZ MEDIA';
        $Marca->description = 'Principal distribuidor de manga japonés en Estados Unidos, incluyendo "Naruto" y "One Piece".';
        $Marca->color = '#ff8000';
        $Marca->save();

        $Marca = new Marca();
        $Marca->Name = 'KODANSHA';
        $Marca->description = 'Editorial japonesa que publica mangas populares como "Attack on Titan" y "Fairy Tail".';
        $Marca->color = '#16ff05';
        $Marca->save();

        $Marca = new Marca();
        $Marca->Name = 'SHUEISHA';
        $Marca->description = 'Conocida por su revista "Shonen Jump", que incluye series como "Dragon Ball" y "One Piece".';
        $Marca->color = '#ffea05';
        $Marca->save();

        $Marca = new Marca();
        $Marca->Name = 'TOKIOPOP';
        $Marca->description = 'Publica manga traducido al inglés, incluyendo títulos como "Fruits Basket" y "Sailor Moon".';
        $Marca->color = '#d116d4';
        $Marca->save();

        $Marca = new Marca();
        $Marca->Name = 'YEN PRESS';
        $Marca->description = 'Especializada en manga y novelas ligeras, incluyendo series como "Sword Art Online" y "Black Butler".';
        $Marca->color = '#a3a3a3';
        $Marca->save();

        $Marca = new Marca();
        $Marca->Name = 'PANINI MANGA';
        $Marca->description = 'Editorial que distribuye mangas y cómics en varios países de habla hispana.';
        $Marca->color = '#ff0000';
        $Marca->save();


    }
}
