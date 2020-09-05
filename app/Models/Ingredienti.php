<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ingredienti extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'ingredienti';
    protected $fillable = ['nome'];



    public function dolci()
    {
        return $this->belongsToMany('App\Models\Dolci');
    }

}
