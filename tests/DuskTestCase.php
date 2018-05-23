<?php

namespace Tests;

use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Laravel\Dusk\TestCase as BaseTestCase;
use Tests\Browser\BaseBrowser;

abstract class DuskTestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * Prepare for Dusk test execution.
     *
     * @beforeClass
     * @return void
     */
    public static function prepare()
    {
        static::startChromeDriver();
    }

    /**
     * Create the RemoteWebDriver instance.
     *
     * @return \Facebook\WebDriver\Remote\RemoteWebDriver
     */
    protected function driver()
    {
        $capabilities  = DesiredCapabilities::chrome();
        $chromeOptions = (new ChromeOptions)->addArguments([
            //'headless', // Uncomment to run without seeing Chrome running
            'auto-open-devtools-for-tabs',
            'disable-gpu',
            'unlimited-storage',
            'window-size=1920,1080',
        ]);
        $capabilities->setCapability(ChromeOptions::CAPABILITY, $chromeOptions);

        return RemoteWebDriver::create(
            'http://localhost:9515', $capabilities, 5000, 10000
        );
    }

    /**
     * Create the browser instances needed for the given callback.
     *
     * @param  \Closure $callback
     * @return array
     */
    protected function createBrowsersFor(\Closure $callback)
    {
        if (count(static::$browsers) === 0) {
            static::$browsers = collect([new BaseBrowser($this->createWebDriver())]);
        }

        $additional = $this->browsersNeededFor($callback) - 1;

        for ($i = 0; $i < $additional; $i++) {
            static::$browsers->push(new BaseBrowser($this->createWebDriver()));
        }

        return static::$browsers;
    }
}
