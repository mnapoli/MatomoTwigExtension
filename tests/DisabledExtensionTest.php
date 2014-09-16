<?php

namespace Tests\PiwikTwigExtension;

use PiwikTwigExtension\PiwikTwigExtension;
use Twig_Test_IntegrationTestCase;

class DisabledExtensionTest extends Twig_Test_IntegrationTestCase
{
    protected function getExtensions()
    {
        return [
            new PiwikTwigExtension(null, null, false),
        ];
    }

    protected function getFixturesDir()
    {
        return __DIR__ . '/DisabledExtensionFixture/';
    }
}
