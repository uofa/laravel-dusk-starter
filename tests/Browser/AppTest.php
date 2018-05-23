<?php

namespace Tests\Browser;

use Facebook\WebDriver\Exception\NoSuchElementException;
use Facebook\WebDriver\WebDriverBy;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AppTest extends DuskTestCase
{
    /**
     * Test all features of the app.
     *
     * @return void
     */
    public function testApp()
    {
        $this->browse(function (Browser $browser) {
            $browser->maximize()
                    ->visit('/login');
        });
    }
}
