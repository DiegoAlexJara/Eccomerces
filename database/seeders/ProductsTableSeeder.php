<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('producto')->insert([
            [
                'Name' => 'Spider-Man: Into the Spider-Verse',
                'description' => 'Una emocionante aventura de Spider-Man en diferentes dimensiones.',
                'price' => 29.99,
                'category_id' => 1, // Reemplaza con el ID real de la categoría correspondiente
                'subcategory_id' => 1, // Reemplaza con el ID real de la subcategoría correspondiente
                'marca_id' => 1, // ID de MARVEL COMICS
            ],
            [
                'Name' => 'Batman: Year One',
                'description' => 'La historia de origen de Batman, contada por Frank Miller.',
                'price' => 19.99,
                'category_id' => 1,
                'subcategory_id' => 2,
                'marca_id' => 2, // ID de DC COMICS
            ],
            [
                'Name' => 'The Walking Dead Vol. 1',
                'description' => 'El inicio de la lucha por la supervivencia en un mundo post-apocalíptico.',
                'price' => 14.99,
                'category_id' => 2,
                'subcategory_id' => 1,
                'marca_id' => 3, // ID de IMAGE COMICS
            ],
            [
                'Name' => 'Hellboy: Seed of Destruction',
                'description' => 'La primera historia de Hellboy, un demonio que lucha contra fuerzas oscuras.',
                'price' => 24.99,
                'category_id' => 2,
                'subcategory_id' => 2,
                'marca_id' => 4, // ID de DARK HORSE COMICS
            ],
            [
                'Name' => 'Naruto Vol. 1',
                'description' => 'Sigue las aventuras de Naruto Uzumaki, un ninja en busca de reconocimiento.',
                'price' => 12.99,
                'category_id' => 3,
                'subcategory_id' => 1,
                'marca_id' => 5, // ID de VIZ MEDIA
            ],
            [
                'Name' => 'Attack on Titan Vol. 1',
                'description' => 'Un mundo donde la humanidad lucha por sobrevivir ante gigantes devoradores.',
                'price' => 15.99,
                'category_id' => 3,
                'subcategory_id' => 2,
                'marca_id' => 6, // ID de KODANSHA
            ],
            [
                'Name' => 'One Piece Vol. 1',
                'description' => 'La búsqueda del tesoro más grande del mundo por parte de Monkey D. Luffy y su tripulación.',
                'price' => 10.99,
                'category_id' => 3,
                'subcategory_id' => 2,
                'marca_id' => 7, // ID de SHUEISHA
            ],
            [
                'Name' => 'Fruits Basket Vol. 1',
                'description' => 'La historia de Tohru Honda y su vida con la familia Sohma, que está bajo una maldición.',
                'price' => 13.99,
                'category_id' => 3,
                'subcategory_id' => 1,
                'marca_id' => 8, // ID de TOKIOPOP
            ],
            [
                'Name' => 'Sword Art Online: Aincrad Vol. 1',
                'description' => 'Un grupo de jugadores queda atrapado en un MMORPG mortal.',
                'price' => 16.99,
                'category_id' => 3,
                'subcategory_id' => 2,
                'marca_id' => 9, // ID de YEN PRESS
            ],
            [
                'Name' => 'Dragon Ball Z: Complete Box Set',
                'description' => 'La colección completa de Dragon Ball Z en un solo estuche.',
                'price' => 199.99,
                'category_id' => 1,
                'subcategory_id' => 3,
                'marca_id' => 10, // ID de PANINI MANGA
            ],
        ]);
    }
}
