<?php

namespace Tests\PiwikTwigExtension;

use PiwikTwigExtension\PiwikTwigExtension;
use Twig\Test\IntegrationTestCase;

class NotConfiguredExtensionTest extends IntegrationTestCase
{
    protected function getExtensions()
    {
        return [
            new PiwikTwigExtension(),
        ];
    }

    protected function getFixturesDir()
    {
        return __DIR__ . '/NotConfiguredExtensionFixture/';
    }
}
