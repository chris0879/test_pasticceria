<?php

use Carbon\Carbon;
use App\Models\Dolce;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DolciSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        

        Dolce::create([
            'nome'      =>  'Pastiera Napoletana',
            'prezzo'     =>  '8',
            'qta'  =>  rand(1, 10),
            'created_at' => $this->randomCreated()
        ]);

        Dolce::create([
            'nome'      =>  'Torta Pistocchi',
            'prezzo'     =>  '7',
            'qta'  =>  rand(1, 10),
            'created_at' => $this->randomCreated()
        ]);

        Dolce::create([
            'nome'      =>  'Giandujotto',
            'prezzo'     =>  '5',
            'qta'  =>  rand(1, 10),
            'created_at' => $this->randomCreated()
        ]);

        Dolce::create([
            'nome'      =>  'Cantucci',
            'prezzo'     =>  '4',
            'qta'  =>  rand(1, 10),
            'created_at' => $this->randomCreated()
        ]);
        
        Dolce::create([
            'nome'      =>  'Cannolo siciliano',
            'prezzo'     =>  '6',
            'qta'  =>  rand(1, 10),
            'created_at' => $this->randomCreated()
        ]);

        Dolce::create([
            'nome'      =>  'Cassata Siciliana',
            'prezzo'     =>  '8',
            'qta'  =>  rand(1, 10),
            'created_at' => $this->randomCreated()
        ]);

        Dolce::create([
            'nome'      =>  'Tiramisu',
            'prezzo'     =>  '6',
            'qta'  =>  rand(1, 10),
            'created_at' => $this->randomCreated()
        ]);

        Dolce::create([
            'nome'      =>  'Torrone',
            'prezzo'     =>  '7',
            'qta'  =>  rand(1, 10),
            'created_at' => $this->randomCreated()
        ]);

        Dolce::create([
            'nome'      =>  'Millefoglie',
            'prezzo'     =>  '6',
            'qta'  =>  rand(1, 10),
            'created_at' => $this->randomCreated()
        ]);

        Dolce::create([
            'nome'      =>  'Pasticciotto',
            'prezzo'     =>  '5',
            'qta'  =>  rand(1, 10),
            'created_at' => $this->randomCreated()
        ]); 
        
        Dolce::create([
            'nome'      =>  'Strudel',
            'prezzo'     =>  '8',
            'qta'  =>  rand(1, 10),
            'created_at' => $this->randomCreated()
        ]); 

        Dolce::create([
            'nome'      =>  'Torta caprese',
            'prezzo'     =>  '7',
            'qta'  =>  rand(1, 10),
            'created_at' => $this->randomCreated()
        ]);  

        Dolce::create([
            'nome'      =>  'Cheesecake',
            'prezzo'     =>  '6',
            'qta'  =>  rand(1, 10),
            'created_at' => $this->randomCreated()
        ]); 

        
      

        // insert Ingredienti 
        $ingradienti = [];

        for($x=1;$x<=13; $x++){


            $ingradienti[] = [
                'dolce_id'=> $x, 
                'ingrediente_id'=> rand(1, 12)
            ];

            $ingradienti[] = [
                'dolce_id'=> $x, 
                'ingrediente_id'=> rand(1, 12)
            ];
  
        }

        DB::table('ingredienti_dolci')->insert($ingradienti);

    }


   


    public function randomCreated()
    {
        $adesso = Carbon::now();
        return  $adesso->subDays(rand(0, 4));

    }

    

}
