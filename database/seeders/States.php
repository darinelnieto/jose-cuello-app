<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\State;

class States extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        State::create(['state'=> 'Acabados']);
        State::create(['state'=> 'Corte']);
        State::create(['state'=> 'En bodega']);
        State::create(['state'=> 'Generado']);
        State::create(['state'=> 'Producción']);
    }
}
