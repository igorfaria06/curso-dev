<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Cores extends Model
{
    protected $table = 'cores';
    protected $fillable = [
    	'nome',
    ];
}
