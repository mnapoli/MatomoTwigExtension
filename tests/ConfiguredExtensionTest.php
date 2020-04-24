<?php

namespace Tests\MatomoTwigExtension;

use MatomoTwigExtension\MatomoTwigExtension;
use Twig\Test\IntegrationTestCase;

class ConfiguredExtensionTest extends IntegrationTestCase
{
    protected function getExtensions()
    {
        return [
            new MatomoTwigExtension('example.com', 123),
        ];
    }

    protected function getFixturesDir()
    {
        return __DIR__ . '/ConfiguredExtensionFixture/';
    }
}
