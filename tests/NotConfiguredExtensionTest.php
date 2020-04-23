<?php

namespace Tests\MatomoTwigExtension;

use MatomoTwigExtension\MatomoTwigExtension;
use Twig\Test\IntegrationTestCase;

class NotConfiguredExtensionTest extends IntegrationTestCase
{
    protected function getExtensions()
    {
        return [
            new MatomoTwigExtension(),
        ];
    }

    protected function getFixturesDir()
    {
        return __DIR__ . '/NotConfiguredExtensionFixture/';
    }
}
