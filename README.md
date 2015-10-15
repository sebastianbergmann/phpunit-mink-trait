# phpunit-mink-trait

Trait that provides a minimal integration layer for using [Mink](https://github.com/minkphp/Mink) (with the [Goutte](https://github.com/minkphp/MinkGoutteDriver) driver) in PHPUnit test cases.

The main goal of this project is to demonstrate how PHPUnit can be extended through traits.

## Installation

To add this component as a local, per-project dependency to your project, simply add a dependency on `sebastian/phpunit-mink-trait` to your project's `composer.json` file. Here is a minimal example of a `composer.json` file that just defines a dependency on this component:

```JSON
{
    "require": {
        "sebastian/phpunit-mink-trait": "~1.0"
    }
}
```

## Usage

```php
<?php
class ExampleTest extends PHPUnit_Framework_TestCase
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

