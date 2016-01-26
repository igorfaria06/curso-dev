<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class CarrosMarca extends Model
{
	protected $table = 'carros_marca';
	protected $fillable = [
		'nome',
	];
}
