<?php

namespace Tests\PiwikTwigExtension;

use PiwikTwigExtension\PiwikTwigExtension;
use Twig_Test_IntegrationTestCase;

class ConfiguredExtensionTest extends Twig_Test_IntegrationTestCase
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
