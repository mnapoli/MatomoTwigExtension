# Piwik Twig integration

This library integrates Piwik into Twig.

## Installation

    composer require "mnapoli/piwik-twig-extension"

## Usage

You have 2 ways to give the Piwik host and site ID:

- when creating the extension:

```php
$twig->addExtension(new \PiwikTwigExtension\PiwikTwigExtension('mypiwik.host.com', 123));
```

In the templates, you then just call `{{ piwik() }}`.

This solution is appropriate in most cases.

- when calling the Twig function:

```php
$twig->addExtension(new \PiwikTwigExtension\PiwikTwigExtension());
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

## License

This library is released under the [MIT license](http://opensource.org/licenses/MIT).
