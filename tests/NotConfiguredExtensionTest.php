<?php

namespace Tests\PiwikTwigExtension;

use PiwikTwigExtension\PiwikTwigExtension;
use Twig_Test_IntegrationTestCase;

class NotConfiguredExtensionTest extends Twig_Test_IntegrationTestCase
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
