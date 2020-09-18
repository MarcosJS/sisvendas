<?php

use App\Cliente;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Cliente::class, 4)
            ->create()
            ->each(function ($c) {
                $c->endereco()->save(factory(\App\Endereco::class)->make());
                $c->telefone()->saveMany(factory(\App\Telefone::class, 2)->make());
            });
    }
}
