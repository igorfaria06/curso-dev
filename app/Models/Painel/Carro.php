<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Carro extends Model
{
	protected $guarded = ['id'];
	protected $table = 'carros';


	static $rules = [
		'nome' => 'required|min:3|max:150',
		'placa' => 'required|min:7|max:7',
	];

	public function getChassis (){
		return $this->hasOne('App\Models\Painel\CarroChassis', 'id_carro');
	}

	public function getMarca (){
		return $this->hasMany('App\Models\Painel\CarrosMarca', 'id', 'id_marca');
	}

	public function getCores (){
		return $this->belongsToMany('App\Models\Painel\Cores', 'liga_carro_cor', "id_carro", 'id_cor');
	}
}
