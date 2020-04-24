# Matomo Twig integration

[![Build Status](https://travis-ci.com/mnapoli/MatomoTwigExtension.svg?branch=master)](https://travis-ci.com/mnapoli/MatomoTwigExtension)

This library integrates [Matomo](https://matomo.org//) into [Twig](https://twig.symfony.com/). _Previously named PiwikTwigExtension_.

## Installation

    composer require "mnapoli/piwik-twig-extension"

## Usage

You have 2 ways to give the Matomo host and site ID:

- When creating the extension (**recommended**)

    ```php
    $twig->addExtension(new MatomoTwigExtension('my-matomo-host.com', 123));
    ```

    In the templates, you then just call `{{ matomo() }}`.

    This solution is appropriate in most cases.

- When calling the Twig function

    ```php
    $twig->addExtension(new MatomoTwigExtension());
    ```

    In the templates, you have to provide the host and site id: `{{ matomo('my-matomo-host.com', 123) }}`.

    This solution is perfect if you want to be able to customize the site id or Matomo host in the template.

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

        {{ matomo() }}
    </body>
</html>
```

### Development environment

In some environments, you want to disable Matomo's tracking (for example on your local machine).
That is easily possible by passing `false` for the `$enabled` parameter:

```php
$twig->addExtension(new MatomoTwigExtension($host, $siteId, false));
```

## License

This library is released under the [MIT license](http://opensource.org/licenses/MIT).
