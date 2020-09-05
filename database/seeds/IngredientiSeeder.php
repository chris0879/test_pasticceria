<?php

use Illuminate\Database\Seeder;
use App\Models\Ingredienti;

class IngredientiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ingredienti::create([
            'nome'          =>  'Burro',
        ]);

        Ingredienti::create([
            'nome'          =>  'Olio',
        ]);

        Ingredienti::create([
            'nome'          =>  'Farina',
        ]);

        Ingredienti::create([
            'nome'          =>  'Cioccolato',
        ]);

        Ingredienti::create([
            'nome'          =>  'Zucchero',
        ]);

        Ingredienti::create([
            'nome'          =>  'Nocciole',
        ]);

        Ingredienti::create([
            'nome'          =>  'Sale',
        ]);

        Ingredienti::create([
            'nome'          =>  'Uova',
        ]);

        Ingredienti::create([
            'nome'          =>  'Vaniglia',
        ]);

        Ingredienti::create([
            'nome'          =>  'Lievito',
        ]);

        Ingredienti::create([
            'nome'          =>  'Mascarpone',
        ]);

        Ingredienti::create([
            'nome'          =>  'latte',
        ]);
    }
}
