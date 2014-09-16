# Piwik Twig integration

[![Build Status](https://travis-ci.org/mnapoli/PiwikTwigExtension.svg)](https://travis-ci.org/mnapoli/PiwikTwigExtension) [![Coverage Status](https://img.shields.io/coveralls/mnapoli/PiwikTwigExtension.svg)](https://coveralls.io/r/mnapoli/PiwikTwigExtension)

This library integrates [Piwik](http://piwik.org/) into [Twig](http://twig.sensiolabs.org/).

## Installation

    composer require "mnapoli/piwik-twig-extension"

## Usage

You have 2 ways to give the Piwik host and site ID:

- When creating the extension (**recommended**)

```php
$twig->addExtension(new PiwikTwigExtension('my-piwik-host.com', 123));
```

In the templates, you then just call `{{ piwik() }}`.

This solution is appropriate in most cases.

- When calling the Twig function

```php
$twig->addExtension(new PiwikTwigExtension());
```

In the templates, you have to provide the host and site id: `{{ piwik('mypiwik.host.com', 123) }}`.

This solution is perfect if you want to be able to customize the site id or Piwik host in the template.

---

Don't forget to add the tracker script at the end of the HTML document, for example:

```html
<!DOCTYPE html>
<html>
    <head>
        ...
    </head>
    <body>
        ...

        {{ piwik() }}
    </body>
</html>
```

### Development environment

In some environments, you want to disable Piwik's tracking (for example on your local machine).
That is easily possible by passing `false` for the `$enabled` parameter:

```php
$twig->addExtension(new PiwikTwigExtension($host, $siteId, false));
```


## License

This library is released under the [MIT license](http://opensource.org/licenses/MIT).
