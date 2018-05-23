<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Dusk\Browser;

class TestServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        Browser::macro('scrollIntoView', function ($id, $addBuffer = true) {
            $this->script("document.getElementById('{$id}').scrollIntoView()");

            if ($addBuffer) {
                $this->script('window.scroll(0, window.scrollY - 50)');
            }

            return $this;
        });

        Browser::macro('scrollTo', function ($element) {
            $this->script("Dom7('html, body').animate({ scrollTop: Dom7('{$element}').offset().top }, 0);");

            return $this;
        });
    }
}
