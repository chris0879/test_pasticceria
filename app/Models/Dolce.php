<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dolce extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'dolci';
    protected $fillable = ['nome','prezzo','qta','created_at'];

    public function ingredienti()
    {
        return $this->belongsToMany('App\Models\Ingredienti', 'ingredienti_dolci', 'dolce_id', 'ingrediente_id');
    }



    
}
