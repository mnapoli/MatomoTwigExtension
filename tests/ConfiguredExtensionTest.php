<?php

namespace Tests\PiwikTwigExtension;

use PiwikTwigExtension\PiwikTwigExtension;
use Twig\Test\IntegrationTestCase;

class ConfiguredExtensionTest extends IntegrationTestCase
{
    protected function getExtensions()
    {
        return [
            new PiwikTwigExtension('example.com', 123),
        ];
    }

    protected function getFixturesDir()
    {
        return __DIR__ . '/ConfiguredExtensionFixture/';
    }
}
