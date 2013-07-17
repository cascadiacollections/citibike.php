## Usage

Set up the Citibike client:

```php
$client = new Citibike\Client();
```

Then do what you wish with the data:

```php
echo "Getting Stations\n";
foreach ($client->getStations()->results as $station) {
    echo "ID: " . $station->id . "\n";
    echo "Label: " . $station->label . "\n";
    echo "Latitude: " . $station->latitude . "\n";
    echo "Longitude: " . $station->longitude . "\n";
    echo "Available Bikes: " . $station->availableBikes . "\n";
    echo "Available Docks: " . $station->availableDocks . "\n";
}
```

### Stations Method

```php
$client->getStations();
```

### Branches Method

```php
$client->getBranches();
```

### Helmets Method

```php
$client->getHelmets();
```

## Installation

Citibike.php is available on [composer](http://getcomposer.org). You can install it by adding Citibike.php as a project dependency in your `composer.json` file like so:

```js
{
    "require": {
        "kevintcoughlin/citibike": "dev-master"
    }
}
```

Then simply run 

```
$ php composer.phar install
```

to install the library. More documentation on using composer can be found [here](http://getcomposer.org/doc/01-basic-usage.md).

## Dependencies

Citibike.php is available via [composer](http://google.com)

* Guzzle ~3.7

I suggest using composer to install Citibike.php. To install via composer you can just run:

```
php composer.phar install
```

More documentation for composer can be found at [getcomposer.org](http://getcomposer.org).

## Testing

Citibike.php has full unit tests that can be run with PHPUnit using:

```
$ phpunit
```

## Contributors

This is my first PHP library so feel free to improve the code and issue a pull request. I'll list you both here and in `composer.json`. Thanks in advance!

## License

The MIT License (MIT)

Copyright (c) 2013 Kevin Coughlin

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.