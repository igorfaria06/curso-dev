<?php

use Illuminate\Database\Seeder;

class CarrosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
    	$carros = [
    		0 => ['nome' => 'Gol', 'placa' => 'UEB-2341'],
    		1 => ['nome' => 'Uno', 'placa' => 'AUV-9021']
     	];

        DB::table('carros')->insert($carros);
    }
}
