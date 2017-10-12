# phpunit-mink-trait

Trait that provides a minimal integration layer for using [Mink](https://github.com/minkphp/Mink) (with the [Goutte](https://github.com/minkphp/MinkGoutteDriver) driver) in PHPUnit test cases.

The main goal of this project is to demonstrate how PHPUnit can be extended through traits.

## Installation

You can add this library as a local, per-project dependency to your project using [Composer](https://getcomposer.org/):

    composer require phpunit/phpunit-mink-trait

If you only need this library during development, for instance to run your project's test suite, then you should add it as a development-time dependency:

    composer require --dev phpunit/phpunit-mink-trait

## Usage

```php
<?php
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    use phpunit\mink\TestCaseTrait;

    public function testHasCorrectTitle()
    {
        $page = $this->visit('http://example.com/');

        $this->assertContains(
            'Example Domain', $page->find('css', 'title')->getHtml()
        );
    }

    public function testMoreInformationCanBeAccessed()
    {
        $page = $this->visit('http://example.com/');
        $page->clickLink('More information...');

        $this->assertContains(
            'IANA', $page->find('css', 'title')->getHtml()
        );
    }
}
```

