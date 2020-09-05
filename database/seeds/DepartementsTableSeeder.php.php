<?php

use Illuminate\Database\Seeder;
use App\Departement;
class DepartementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Departement::create(['name'=>'Division Ressources humaines']);
        Departement::create(['name'=>'Division Organisation et systèmes d’information']);
        Departement::create(['name'=>'Division gestion du patrimoine']);
        Departement::create(['name'=>'Division des moyens généraux']);
        Departement::create(['name'=>'Division des finances et de la compatibilité']);
    }
}
