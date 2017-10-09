<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Cliente::class, 1000)->create()->each(function($c) {
        	$c->enderecos()->save(factory('App\Endereco')->make());
        	$c->enderecos()->save(factory('App\Endereco')->make());
        	$c->enderecos()->save(factory('App\Endereco')->make());
        });
    }
}
