# UPGRADE FROM 2.x to 3.0

The main change is the renaming of the extension because [Piwik evolved into Matomo in 2018](https://matomo.org/blog/2018/01/piwik-is-now-matomo/).

We did not renamed the composer package to avoid confusion.

### When using in a PHP file:

Before:

```php
$twig->addExtension(new PiwikTwigExtension('stats.host.com', 123));
```

After:

```php
$twig->addExtension(new MatomoTwigExtension('stats.host.com', 123));
```
### When using in a Twig file:

Before:

```twig
{{ piwik('stats.host.com', 123) }}
```

After:

```php
{{ matomo('stats.host.com', 123) }}
```
