<?php

namespace Tests\MatomoTwigExtension;

use MatomoTwigExtension\MatomoTwigExtension;
use Twig\Test\IntegrationTestCase;

class ConfiguredExtensionTest extends IntegrationTestCase
{
    public function testExtensionName()
    {
        $extension = new MatomoTwigExtension('example.com', 123);

        $this->assertSame('matomo', $extension->getName());
    }

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
