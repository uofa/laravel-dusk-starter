> Laravel Dusk provides an expressive, easy-to-use browser automation and testing API.
> By default, Dusk does not require you to install JDK or Selenium on your machine.
> Instead, Dusk uses a standalone ChromeDriver installation.
> However, you are free to utilize any other Selenium compatible driver you wish.

### Setup

- Install necessary dependencies (`composer install`)
- Start writing your tests by modifying `./tests/Browser/AppTest.php`
- Refer to the [documentation (`v5.4`)](https://laravel.com/docs/5.4/dusk#available-assertions) for help in choosing assertions
- To run Dusk, execute `php artisan dusk` on the command line

### Custom Browser Assertions

- `./tests/Browser/BaseBrowser.php`

| Assertion                                              | Description                                                                 |
|--------------------------------------------------------|-----------------------------------------------------------------------------|
| `$browser->assertElementCountIs($count, $elements)`    | Assertion for checking the number of elements matches a given count.        |
| `$browser->assertElementCountIsNot($count, $elements)` | Assertion for checking the number of elements does not match a given count. |

### Custom Browser Macros

- `./app/Providers/TestServiceProvider.php`

```php
$browser->scrollIntoView(string $id [, bool $addBuffer = true]);

$browser->scrollTo(string $element);
```