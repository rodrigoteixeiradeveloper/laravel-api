<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idioma extends Model
{
    use HasFactory;

    protected $fillable = [ 'nome' ];

    //pegar traducoes
    public function traducoes () {
        return $this->hasMany(Traducao::class);
    }
}
