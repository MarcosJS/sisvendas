<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CadastrarProdutoTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/');
                //->pause(2000)
                    //->assertSee('ID');
        });
    }
}
